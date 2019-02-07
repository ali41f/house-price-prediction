<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 mt-3">
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info-active">
            <h3 class="widget-user-username">Ali Rehman</h3>
            <h5 class="widget-user-desc">Founder &amp; CEO</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" :src="getProfilePhoto()" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">3,200</h5>
                  <span class="description-text">SALES</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">13,000</h5>
                  <span class="description-text">FOLLOWERS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">35</h5>
                  <span class="description-text">PRODUCTS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link active show" href="#activity" data-toggle="tab">Activity</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
              </li>
            </ul>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active show" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img
                      class="img-circle img-bordered-sm"
                      :src="getProfilePhoto()"
                      alt="user image"
                    >
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                      <a href="#" class="float-right btn-tool">
                        <i class="fa fa-times"></i>
                      </a>
                    </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <p>
                    <a href="#" class="link-black text-sm mr-2">
                      <i class="fa fa-share mr-1"></i> Share
                    </a>
                    <a href="#" class="link-black text-sm">
                      <i class="fa fa-thumbs-o-up mr-1"></i> Like
                    </a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="fa fa-comments-o mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input
                    class="form-control form-control-sm"
                    type="text"
                    placeholder="Type a comment"
                  >
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="img/profile.png" alt="User Image">
                    <span class="username">
                      <a href="#">Sarah Ross</a>
                      <a href="#" class="float-right btn-tool">
                        <i class="fa fa-times"></i>
                      </a>
                    </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="input-group input-group-sm mb-0">
                      <input class="form-control form-control-sm" placeholder="Response">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-danger">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input
                        type="email"
                        v-model="form.name"
                        class="form-control"
                        id="inputName"
                        :class="{'is-invalid': form.errors.has('name')}"
                        placeholder="Name"
                      >
                      <has-error :form="form" field="name"></has-error>
                      <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input
                        type="email"
                        v-model="form.email"
                        class="form-control"
                        id="inputEmail"
                        :class="{'is-invalid': form.errors.has('email')}"
                        placeholder="Email"
                      >
                      <has-error :form="form" field="email"></has-error>
                      <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Bio</label>

                    <div class="col-sm-10">
                      <textarea
                        class="form-control"
                        v-model="form.bio"
                        :class="{'is-invalid': form.errors.has('bio')}"
                        id="inputExperience"
                        placeholder="Experience"
                      ></textarea>
                      <has-error :form="form" field="type"></has-error>
                      <div v-if="errors && errors.type" class="text-danger">{{ errors.type[0] }}</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Photo</label>

                    <div class="col-sm-10">
                      <input type="file" @change="updateProfile">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input
                        type="password"
                        class="form-control"
                        v-model="form.password"
                        id="password"
                        :class="{'is-invalid': form.errors.has('password')}"
                        placeholder="password"
                      >
                      <has-error :form="form" field="password"></has-error>
                      <div
                        v-if="errors && errors.password"
                        class="text-danger"
                      >{{ errors.password[0] }}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button
                        type="submit"
                        @click.prevent="updateInfo"
                        class="btn btn-danger"
                      >Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
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
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    axios.get("api/profile").then(({ data }) => {
      this.form.fill(data);
    });
  },
  methods: {
    getProfilePhoto() {
      let photo =
        this.form.photo.length > 200
          ? this.form.photo
          : "img/profile/" + this.form.photo;
      return photo;
    },
    updateProfile(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      if (file["size"] < 2111775) {
        reader.onloadend = file => {
          this.form.photo = reader.result;
        };
        reader.readAsDataURL(file);
      } else {
        Swal.fire({
          type: "error",
          title: "Oops...",
          text: "You are uploading a file larger than 2MB"
        });
      }
    },
    updateInfo() {
      this.$Progress.start();
      if (this.form.password == "") {
        this.form.password = undefined;
      }
      this.form
        .put("api/profile")
        .then(data => {
          this.form.photo = data.data.photo;
          console.log(data);
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    }
  }
};
</script>
