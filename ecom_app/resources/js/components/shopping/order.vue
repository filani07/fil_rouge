<template >
  <div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light border rounded">
      <router-link class="navbar-brand" to="/shop">
        <img src="assets/img/logo/logo1.png" height="38" alt="MyEcom logo" />
      </router-link>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="basicExampleNav11">
        <!-- Right -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link to="/cart" class="nav-link navbar-link-2 waves-effect">
              <span
                class="badge badge-pill red text-light"
                style="background-color: red"
                >{{ carts.cartItem }}</span
              >
              <i class="fas fa-shopping-cart pl-0"></i>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/shop" class="nav-link waves-effect">
              Shop
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/order" class="nav-link waves-effect">
              Order
            </router-link>
          </li>
          <li class="nav-item">
            <a href="#!" class="nav-link waves-effect"> Contact </a>
          </li>
          <li class="nav-item pl-2 mb-2 mb-md-0">
            <router-link
              to="/logout"
              type="button"
              class="
                btn btn-outline-info btn-md btn-rounded btn-navbar
                waves-effect waves-light
              "
              >Logout</router-link
            >
          </li>
        </ul>
      </div>
      <!-- Links -->
    </nav>
    <!-- Navbar -->
    <div class="container my-5">
      <div class="d-flex justify-content-center row">
        <div class="col-md-8">
          <div class="p-3 bg-white rounded">
            <div class="row">
              <div class="col-md-6">
                <h1 class="text-uppercase">Invoice</h1>
                <div class="billed">
                  <span class="font-weight-bold text-uppercase">Billed:</span
                  ><span class="ml-1">Jasper Kendrick</span>
                </div>
                <div class="billed">
                  <span class="font-weight-bold text-uppercase">Date:</span
                  ><span class="ml-1">May 13, 2020</span>
                </div>
                <div class="billed">
                  <span class="font-weight-bold text-uppercase">Order ID:</span
                  ><span class="ml-1">#1345345</span>
                </div>
              </div>
              <div class="col-md-6 text-right mt-3">
                <h4 class="text-danger mb-0">Rae jones</h4>
                <span>bbbootstrap.com</span>
              </div>
            </div>
            <div class="mt-3">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Unit</th>
                      <th>Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Custom oil painting (24 X 36 in.)</td>
                      <td>10</td>
                      <td>34</td>
                      <td>340</td>
                    </tr>
                    <tr>
                      <td>Digital illustraion paint(8.5 X 11 in.)</td>
                      <td>12</td>
                      <td>50</td>
                      <td>600</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Total</td>
                      <td>940</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  components: {},
  data() {
    return {
      carts: null,
      Cartuser: null,

      form: {
        user_id: User.id(),
      },
    };
  },

  computed: {},
  //   .then(({ data }) => (this.carts = data))

  methods: {
    allCart() {
      axios
        .post("/api/showcart", this.form)
        .then(({ data }) => (this.carts = data))
        .catch((err) => {});
    },

    UserCart() {
      axios
        .post("/api/getCartUser", this.form)
        .then(({ data }) => (this.Cartuser = data))
        .catch((err) => {});
    },
  },
  created() {
    if (!User.loggedIn() || User.role() === "admin") {
      this.$router.push({ name: "/" });
    }
    this.allCart();
    this.UserCart();
  },
};
</script>

<style scoped>
</style>
