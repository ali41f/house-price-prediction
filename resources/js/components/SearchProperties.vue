<template>
  <div class="row mt-5" v-if="this.searchProperties">
    <div class="col-12">
      <div class="card" v-if="this.searchProperties.total">
        <div class="card-header">
          <h3 class="card-title">Properties from our database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>ID</th>
                <th>Location</th>
                <th>Description</th>
                <th>Price</th>
              </tr>
              <tr v-for="property in searchProperties.data" :key="property.id">
                <td>{{property.id}}</td>
                <td>{{property.propertylocation}}</td>
                <td>{{unescapeHTML(utf8Decode(property.descr))}}</td>
                <td>{{unescapeHTML(utf8Decode(property.price))}}</td>
                <td>
                  <a :href="property.source">Source</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <pagination :data="searchProperties" @pagination-change-page="getResults" :limit="5"></pagination>
        </div>
      </div>
      <!-- /.card -->
      <h3 v-if="!this.searchProperties.total">No record found</h3>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      searchProperties: "",
      props: {
        query: String
      }
    };
  },
  created() {
    console.log("Component created.");
    Fire.$on("searching", () => {
      let query = this.$parent.search;
      console.log(query);
      axios
        .get("api/findProperty?q=" + query)
        .then(data => {
          this.searchProperties = data.data;
        })
        .catch(() => {});
    });
  },
  methods: {
    getResults(page = 1) {
      let query = this.$parent.search;
      this.$Progress.start();
      if (!query) {
        this.searchProperties = "";
      } else {
        axios
          .get("api/findProperty?q=" + query + "&&page=" + page)
          .then(response => {
            this.searchProperties = response.data;
            this.$Progress.finish();
          });
      }
    },
    utf8Decode(input) {
      let output = "";
      for (var i = 0; i < input.length; i++) {
        if (input.charCodeAt(i) <= 127) {
          output += input.charAt(i);
        }
      }
      return output;
    },
    unescapeHTML(escapedHTML) {
      return escapedHTML
        .replace(/&lt;/g, "<")
        .replace(/&gt;/g, ">")
        .replace(/&amp;/g, "&");
    }
  }
};
</script>

<style  scoped>
</style>
