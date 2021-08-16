<template >
  <div>
    <div class="my-login-page">
      <section class="h-100">
        <div class="container h-100">
          <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
              <div class="brand">
                <img src="assets/img/logo/logo.png" alt="logo" />
              </div>
              <div class="card fat">
                <div class="card-body">
                  <h4 class="card-title">Login</h4>
                  <form
                    method="POST"
                    class="my-login-validation"
                    novalidate=""
                    @submit.prevent="login"
                  >
                    <div class="form-group">
                      <label for="email">E-Mail Address</label>
                      <input
                        id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        value=""
                        v-model="form.email"
                        required
                        autofocus
                      />
                      <small class="text-danger" v-if="errors.email">{{
                        errors.email[0]
                      }}</small>
                      <div class="invalid-feedback">Email is invalid</div>
                    </div>

                    <div class="form-group">
                      <label for="password"
                        >Password
                        <router-link to="/forget" class="float-right">
                          Forgot Password?
                        </router-link>
                      </label>
                      <input
                        id="password"
                        type="password"
                        class="form-control"
                        name="password"
                        v-model="form.password"
                        required
                        data-eye
                      />
                      <small class="text-danger" v-if="errors.password">{{
                        errors.password[0]
                      }}</small>
                      <div class="invalid-feedback">Password is required</div>
                    </div>

                    <div class="form-group">
                      <div class="custom-checkbox custom-control">
                        <input
                          type="checkbox"
                          name="remember"
                          id="remember"
                          class="custom-control-input"
                        />
                        <label for="remember" class="custom-control-label"
                          >Remember Me</label
                        >
                      </div>
                    </div>

                    <div class="form-group m-0">
                      <button type="submit" class="btn btn-primary btn-block">
                        Login
                      </button>
                    </div>
                    <div class="mt-4 text-center">
                      Don't have an account?
                      <router-link to="/register">Create One</router-link>
                    </div>
                  </form>
                </div>
              </div>
              <div class="footer">Copyright &copy; 2021 &mdash; MyEcom</div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
  created() {
    if (User.loggedIn()) {
      if (User.role() === "admin") {
        this.$router.push({ name: "home" });
      }
      if (User.role() === "client") {
        this.$router.push({ name: "shop" });
      }
    }
  },
  components: {},
  data() {
    return {
      form: {
        email: null,
        password: null,
      },
      errors: {},
    };
  },
  methods: {
    login() {
      axios
        .post("api/auth/login", this.form)
        .then((res) => {
          User.responseAfterlogin(res);
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer);
              toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
          });

          Toast.fire({
            icon: "success",
            title: "Signed in successfully",
          });

          if (User.role() == "admin") {
            this.$router.push({ name: "home" });
          }
          if (User.role() == "client") {
            this.$router.push({ name: "shop" });
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer);
              toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
          });
          Toast.fire({
            icon: "warning",
            title: "Invalid Email or Password",
          });
        });
    },
  },
  beforeMount() {},
};
</script>

<style scoped>
body.my-login-page {
  background-color: #f7f9fb;
  font-size: 14px;
}

.my-login-page .brand {
  width: 90px;
  height: 90px;
  overflow: hidden;
  border-radius: 50%;
  margin: 40px auto;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
  position: relative;
  z-index: 1;
}

.my-login-page .brand img {
  width: 100%;
}

.my-login-page .card-wrapper {
  width: 400px;
}

.my-login-page .card {
  border-color: transparent;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

.my-login-page .card.fat {
  padding: 10px;
}

.my-login-page .card .card-title {
  margin-bottom: 30px;
}

.my-login-page .form-control {
  border-width: 2.3px;
}

.my-login-page .form-group label {
  width: 100%;
}

.my-login-page .btn.btn-block {
  padding: 12px 10px;
}

.my-login-page .footer {
  margin: 40px 0;
  color: #888;
  text-align: center;
}

@media screen and (max-width: 425px) {
  .my-login-page .card-wrapper {
    width: 90%;
    margin: 0 auto;
  }
}

@media screen and (max-width: 320px) {
  .my-login-page .card.fat {
    padding: 0;
  }

  .my-login-page .card.fat .card-body {
    padding: 15px;
  }
}
</style>
