<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Enter Details of house from Islamabad</h3>

            <div class="card-tools"></div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Location</label>
                  <select class="form-control" v-model="form.location" name="location">
                    <option value="1000">E-7</option>
                    <option value="980">F-6</option>
                    <option value="960">F-7</option>
                    <option value="940">Bahria Town</option>
                    <option value="920">DHA</option>
                    <option value="900">F-8</option>
                    <option value="880">F-10</option>
                    <option value="860">F-11</option>
                    <option value="840">E-11</option>
                    <option value="820">D-12</option>
                    <option value="800">G-6</option>
                    <option value="790">G-7</option>
                    <option value="780">G-8</option>
                    <option value="760">I-8</option>
                    <option value="740">G-9</option>
                    <option value="720">I-9</option>
                    <option value="700">G-10</option>
                    <option value="680">G-11</option>
                    <option value="660">I-10</option>
                    <option value="695">G-13</option>
                    <option value="620">G-14</option>
                    <option value="600">G-15</option>

                    <option value="580">I-13</option>
                    <option value="560">I-14</option>
                    <option value="540">D-17</option>
                    <option value="650">Bani Gala</option>
                    <option value="520">F-17</option>
                    <option value="655">PWD</option>
                    <option value="645">Soan Garden</option>
                    <option value="500">H-13</option>
                    <option value="480">B-17</option>
                    <option value="460">CBR Town</option>
                    <option value="656">Ghauri town</option>
                    <option value="636">National police foundation o9</option>
                    <option value="590">Bhara kaho</option>
                    <option value="642">Pakistan town</option>
                  </select>

                  <has-error :form="form" field="location"></has-error>
                  <div v-if="errors && errors.location" class="text-danger">{{ errors.location[0] }}</div>
                </div>
                <div class="form-group col-md-6">
                  <label>Size</label>
                  <select class="form-control" v-model="form.size" name="size">
                    <option value="4500">1 kanal</option>
                    <option value="6750">1.5 kanal</option>
                    <option value="9000">2 kanal</option>
                    <option value="11250">2.5 kanal</option>
                    <option value="675">3 marla</option>
                    <option value="1125">5 marla</option>
                    <option value="1575">7 marla</option>
                    <option value="1800">8 marla</option>
                    <option value="2250">10 marla</option>
                    <option value="2700">12 marla</option>
                    <option value="3150">14 marla</option>
                  </select>
                  <has-error :form="form" field="size"></has-error>
                  <div v-if="errors && errors.size" class="text-danger">{{ errors.size[0] }}</div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Bedrooms</label>
                  <select class="form-control" v-model="form.bedrooms" name="bedrooms">
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                  <has-error :form="form" field="bedrooms"></has-error>
                  <div v-if="errors && errors.bedrooms" class="text-danger">{{ errors.bedrooms[0] }}</div>
                </div>
                <div class="form-group col-md-4">
                  <label>Bathrooms</label>
                  <select class="form-control" v-model="form.bathrooms" name="bathrooms">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                  <has-error :form="form" field="bathrooms"></has-error>
                  <div
                    v-if="errors && errors.bathrooms"
                    class="text-danger"
                  >{{ errors.bathrooms[0] }}</div>
                </div>
                <div class="form-group col-md-4">
                  <label>Kitchens</label>
                  <select class="form-control" v-model="form.kitchens" name="kitchens">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                  <has-error :form="form" field="kitchens"></has-error>
                  <div v-if="errors && errors.kitchens" class="text-danger">{{ errors.kitchens[0] }}</div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Imported kitchen</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="importedkitchen"
                      value="1"
                      id="importedkitchenyes"
                      v-model="form.importedkitchen"
                    >
                    <label class="form-check-label" for="importedkitchenyes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="importedkitchenno"
                      name="importedkitchen"
                      value="0"
                      v-model="form.importedkitchen"
                      checked
                    >
                    <label class="form-check-label" for="importedkitchenno">No</label>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label>Swimming pool</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="swimmingpool"
                      value="1"
                      id="swimmingpoolyes"
                      v-model="form.swimmingpool"
                    >
                    <label class="form-check-label" for="swimmingpoolyes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="swimmingpoolno"
                      name="swimmingpool"
                      v-model="form.swimmingpool"
                      value="0"
                      checked
                    >
                    <label class="form-check-label" for="swimmingpoolno">No</label>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label>Gym</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      v-model="form.gym"
                      type="radio"
                      name="gym"
                      value="1"
                      id="gymyes"
                    >
                    <label class="form-check-label" for="gymyes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="gymno"
                      name="gym"
                      value="0"
                      v-model="form.gym"
                      checked
                    >
                    <label class="form-check-label" for="gymno">No</label>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label>Corner Plot</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="cornerplot"
                      value="1"
                      v-model="form.cornerplot"
                      id="cornerplotyes"
                    >
                    <label class="form-check-label" for="cornerplotyes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="cornerplotno"
                      name="cornerplot"
                      v-model="form.cornerplot"
                      value="0"
                      checked
                    >
                    <label class="form-check-label" for="cornerplotno">No</label>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Jacuzzi</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="jacuzzi"
                      value="1"
                      id="jacuzziyes"
                      v-model="form.jacuzzi"
                    >
                    <label class="form-check-label" for="jacuzziyes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="jacuzzino"
                      name="jacuzzi"
                      value="0"
                      v-model="form.jacuzzi"
                      checked
                    >
                    <label class="form-check-label" for="jacuzzino">No</label>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label>Garden</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="garden"
                      value="1"
                      id="gardenyes"
                      v-model="form.garden"
                      checked
                    >
                    <label class="form-check-label" for="gardenyes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="gardenno"
                      name="garden"
                      v-model="form.garden"
                      value="0"
                    >
                    <label class="form-check-label" for="gardenno">No</label>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label>Servant Quarters</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      v-model="form.servantquarters"
                      type="radio"
                      name="servantquarters"
                      value="0"
                      id="servantquarters0"
                    >
                    <label class="form-check-label" for="servantquarters0">0</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="servantquarters1"
                      name="servantquarters"
                      value="1"
                      v-model="form.servantquarters"
                      checked
                    >
                    <label class="form-check-label" for="servantquarters1">1</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="servantquarters2"
                      name="servantquarters"
                      value="2"
                      v-model="form.servantquarters"
                    >
                    <label class="form-check-label" for="servantquarters2">2</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="servantquarters3"
                      name="servantquarters"
                      value="3"
                      v-model="form.servantquarters"
                    >
                    <label class="form-check-label" for="servantquarters3">3</label>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label>Build</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="build"
                      value="2"
                      v-model="form.build"
                      id="buildnew"
                      checked
                    >
                    <label class="form-check-label" for="buildnew">New</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="buildold"
                      name="build"
                      v-model="form.build"
                      value="0"
                    >
                    <label class="form-check-label" for="buildold">Old</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="renovated"
                      name="build"
                      v-model="form.build"
                      value="1"
                      checked
                    >
                    <label class="form-check-label" for="renovated">Renovated</label>
                  </div>
                </div>
              </div>
              <hr>
              <button
                type="submit"
                @click.prevent="predictPrice"
                class="btn btn-primary"
              >Predict price</button>
              <span
                class="finalPrice"
                v-if="this.price"
              >Rs. {{numberWithCommas(Math.trunc(this.price))}}</span>
            </form>
          </div>
          <!-- /.card-body -->
          <div v-if="loading" class="ar-loader">
            <img src="img/loader.gif">
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-12 -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      errors: {},
      price: "",
      // Create a new form instance
      form: new Form({
        location: "",
        size: "",
        bedrooms: "",
        bathrooms: "",
        kitchens: "",
        importedkitchen: "0",
        swimmingpool: "0",
        gym: "0",
        cornerplot: "0",
        jacuzzi: "0",
        garden: "1",
        servantquarters: "1",
        build: "2"
      })
    };
  },
  created() {
    console.log("Component created.");
  },
  methods: {
    numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
    predictPrice() {
      this.$Progress.start();
      this.loading = true;
      this.form
        .post("api/regression")
        .then(data => {
          //this.form.photo = data.data.photo;
          this.price = data.data;
          this.$Progress.finish();
          this.errors = "";
          this.loading = false;
        })
        .catch(() => {
          this.$Progress.fail();
          this.errors = this.form.errors.errors;
          this.loading = false;
        });
    },
    utf8Decode(input) {
      let output = "";
      for (var i = 0; i < input.length; i++) {
        if (input.charCodeAt(i) <= 127) {
          output += input.charAt(i);
        }
      }
      return output;
    }
  }
};
</script>

<style  scoped>
.finalPrice {
  font-size: 20px;
  font-weight: bold;
  margin-left: 15px;
  float: right;
}
.ar-loader {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(254, 254, 254, 0.8);
}
.ar-loader img {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 200px;
  height: 200px;
  margin-top: -100px;
  margin-left: -100px;
}
</style>
