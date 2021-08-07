<template >
  <div>
    <div class="row">
      <router-link to="/catagory" class="btn btn-primary"
        >All Catagory
      </router-link>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Catagory</h1>
                  </div>
                  <form class="user" @submit.prevent="CatagoryInsert">
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <input
                            type="text"
                            class="form-control"
                            id="exampleInputFirstName"
                            placeholder="Enter Your Phone Number"
                            v-model="form.phone"
                          />
                          <small class="text-danger" v-if="errors.phone">{{
                            errors.phone[0]
                          }}</small>
                        </div>
                        <div class="col-md-6"></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">
                        Submit
                      </button>
                    </div>
                  </form>
                  <hr />
                  <div class="text-center"></div>
                  <div class="text-center"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Swal from "sweetalert2";

export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "/" });
    }
  },
  components: {},
  data() {
    return {
      form: {
        name: null,
        email: null,
        phone: null,
        shopname: null,
        address: null,
        photo: null,
      },
      errors: {},
    };
  },
  methods: {
    onFileSelected(event) {
      let file = event.target.files[0];
      if (file.size > 1048770) {
        Notification.image_validation();
      } else {
        // console.log(file.name);
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.photo = event.target.result;
          console.log(event.target.result);
        };
        reader.readAsDataURL(file);
      }
    },
    CatagoryInsert() {
      axios
        .post("/api/supplier", this.form)
        .then(() => {
          this.$router.push({ name: "supplier" });
          Notification.success();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>

<style scoped>
</style>
