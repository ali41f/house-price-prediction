<template>
  <div class="container">
    <div class="row mt-5" v-if="$gate.isAdminOrAuthor()">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users</h3>

            <div class="card-tools">
              <button class="btn btn-success" @click="newModal">
                Add New
                <i class="fas fa-user-plus fa-fw"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>registered date</th>
                  <th>Modify</th>
                </tr>
                <tr v-for="user in users.data" :key="user.id">
                  <td>{{user.id}}</td>
                  <td>{{user.name}}</td>
                  <td>{{user.email}}</td>
                  <td>{{user.type | upText}}</td>
                  <td>{{user.created_at | myDate}}</td>
                  <td>
                    <a href="#" @click="editModal(user)">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" @click="deleteUser(user.id)">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <pagination :data="users" @pagination-change-page="getResults"></pagination>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div v-if="!$gate.isAdminOrAuthor()">
      <h2>You are not allowed to access users</h2>
      <not-found></not-found>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="AddNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="AddNewLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddNewLabel">{{editMode ? "Update user" : "Add new user"}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? updateUser() : createUser()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  v-model="form.name"
                  :class="{'is-invalid': form.errors.has('name')}"
                  placeholder="name"
                >
                <has-error :form="form" field="name"></has-error>
                <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
              </div>

              <div class="form-group">
                <input
                  type="email"
                  class="form-control"
                  v-model="form.email"
                  :class="{'is-invalid': form.errors.has('email')}"
                  placeholder="email"
                >
                <has-error :form="form" field="email"></has-error>
                <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
              </div>

              <div class="form-group">
                <textarea
                  id="bio"
                  class="form-control"
                  v-model="form.bio"
                  :class="{'is-invalid': form.errors.has('bio')}"
                  placeholder="bio"
                ></textarea>
                <has-error :form="form" field="bio"></has-error>
              </div>

              <div class="form-group">
                <select
                  id="type"
                  class="form-control"
                  v-model="form.type"
                  :class="{'is-invalid': form.errors.has('type')}"
                >
                  <option value>Select user role</option>
                  <option value="admin">admin</option>
                  <option value="user">standard user</option>
                  <option value="author">author</option>
                </select>
                <has-error :form="form" field="type"></has-error>
                <div v-if="errors && errors.type" class="text-danger">{{ errors.type[0] }}</div>
              </div>

              <div class="form-group">
                <input
                  type="password"
                  class="form-control"
                  v-model="form.password"
                  id="password"
                  :class="{'is-invalid': form.errors.has('password')}"
                  placeholder="password"
                >
                <has-error :form="form" field="password"></has-error>
                <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}</div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button v-show="editMode" type="submit" class="btn btn-success">Update user</button>
              <button v-show="!editMode" type="submit" class="btn btn-primary">Create user</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editMode: true,
      users: {},
      errors: {},
      // Create a new form instance
      form: new Form({
        id: "",
        name: "",
        password: "",
        email: "",
        bio: "",
        type: "",
        photo: ""
      })
    };
  },
  methods: {
    getResults(page = 1) {
      axios.get("api/user?page=" + page).then(response => {
        this.users = response.data;
      });
    },
    loadUsers() {
      if (this.$gate.isAdminOrAuthor()) {
        axios.get("api/user").then(({ data }) => (this.users = data));
      }
    },
    updateUser() {
      this.$Progress.start();
      this.form
        .put("api/user/" + this.form.id)
        .then(() => {
          $("#AddNew").modal("hide");
          Toast.fire({
            type: "success",
            title: "User updated successfully"
          });
          Fire.$emit("AfterCreated");
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    newModal() {
      this.editMode = false;
      this.form.clear();
      this.form.reset();
      $("#AddNew").modal("show");
    },
    editModal(user) {
      this.editMode = true;
      this.form.clear();
      this.form.reset();
      $("#AddNew").modal("show");
      this.form.fill(user);
    },
    deleteUser(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          this.form.delete("api/user/" + id).then(() => {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            Fire.$emit("AfterCreated");
          });
        }
      });
    },
    createUser() {
      this.$Progress.start();
      this.form
        .post("api/user")
        .then(() => {
          Fire.$emit("AfterCreated");
          $("#AddNew").modal("hide");
          Toast.fire({
            type: "success",
            title: "User created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
        });
      /*
      this.errors = {};
      axios
        .post("api/user", this.form)
        .then(response => {})
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
          console.log(error);
        });
        */
    }
  },
  created() {
    this.loadUsers();
    //this.getResults();
    //setInterval(() => this.loadUsers(), 3000);
    /*
    Fire.$on("searching", () => {
      let query = this.$parent.search;
      axios
        .get("api/findUser?q=" + query)
        .then(data => {
          this.users = data.data;
        })
        .catch(() => {});
    });
    Fire.$on("AfterCreated", () => {
      this.loadUsers();
    });
    */
  }
};
</script>
