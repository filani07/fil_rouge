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

    <!-- Order -->
    <div class="container mt-5 mb-5">
      <div class="d-flex justify-content-center row">
        <div class="col-md-10">
          <div class="receipt bg-white p-3 rounded">
            <img src="https://i.imgur.com/zCAnG06.png" width="120" />
            <h4 class="mt-2 mb-3">Your order is confirmed!</h4>
            <h6 class="name">Hello John,</h6>
            <span class="fs-12 text-black-50"
              >your order has been confirmed and will be shipped in two
              days</span
            >
            <hr />
            <div
              class="
                d-flex
                flex-row
                justify-content-between
                align-items-center
                order-details
              "
            >
              <div>
                <span class="d-block fs-12">Order date</span
                ><span class="font-weight-bold">12 March 2020</span>
              </div>
              <div>
                <span class="d-block fs-12">Order number</span
                ><span class="font-weight-bold">OD44434324</span>
              </div>
              <div>
                <span class="d-block fs-12">Payment method</span
                ><span class="font-weight-bold">Credit card</span
                ><img
                  class="ml-1 mb-1"
                  src="https://i.imgur.com/ZZr3Yqj.png"
                  width="20"
                />
              </div>
              <div>
                <span class="d-block fs-12">Shipping Address</span
                ><span class="font-weight-bold text-success">New Delhi</span>
              </div>
            </div>
            <hr />
            <div
              class="
                d-flex
                justify-content-between
                align-items-center
                product-details
              "
            >
              <div class="d-flex flex-row product-name-image">
                <img
                  class="rounded"
                  src="https://i.imgur.com/GsFeDLn.jpg"
                  width="80"
                />
                <div class="d-flex flex-column justify-content-between ml-2">
                  <div>
                    <span class="d-block font-weight-bold p-name"
                      >Ralco formal shirts for men</span
                    ><span class="fs-12">Clothes</span>
                  </div>
                  <span class="fs-12">Qty: 1pcs</span>
                </div>
              </div>
              <div class="product-price">
                <h5>$70</h5>
              </div>
            </div>
            <div
              class="
                d-flex
                justify-content-between
                align-items-center
                product-details
              "
            >
              <div class="d-flex flex-row product-name-image">
                <img
                  class="rounded"
                  src="https://i.imgur.com/b7Ve3fJ.jpg"
                  width="80"
                />
                <div class="d-flex flex-column justify-content-between ml-2">
                  <div>
                    <span class="d-block font-weight-bold p-name"
                      >Ralco formal Belt for men</span
                    ><span class="fs-12">Accessories</span>
                  </div>
                  <span class="fs-12">Qty: 1pcs</span>
                </div>
              </div>
              <div class="product-price">
                <h6>$50</h6>
              </div>
            </div>
            <div class="mt-5 amount row">
              <div class="d-flex justify-content-center col-md-6">
                <img
                  src="https://i.imgur.com/AXdWCWr.gif"
                  width="250"
                  height="100"
                />
              </div>
              <div class="col-md-6">
                <div class="billing">
                  <div class="d-flex justify-content-between">
                    <span>Subtotal</span
                    ><span class="font-weight-bold">$120</span>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <span>Shipping fee</span
                    ><span class="font-weight-bold">$15</span>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <span>Tax</span><span class="font-weight-bold">$5</span>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <span class="text-success">Discount</span
                    ><span class="font-weight-bold text-success">$25</span>
                  </div>
                  <hr />
                  <div class="d-flex justify-content-between mt-1">
                    <span class="font-weight-bold">Total</span
                    ><span class="font-weight-bold text-success">$165</span>
                  </div>
                </div>
              </div>
            </div>
            <span class="d-block">Expected delivery date</span
            ><span class="font-weight-bold text-success">12 March 2020</span
            ><span class="d-block mt-3 text-black-50 fs-15"
              >We will be sending a shipping confirmation email when the item is
              shipped!</span
            >
            <hr />
            <div
              class="d-flex justify-content-between align-items-center footer"
            >
              <div class="thanks">
                <span class="d-block font-weight-bold">Thanks for shopping</span
                ><span>Amazon team</span>
              </div>
              <div
                class="d-flex flex-column justify-content-end align-items-end"
              >
                <span class="d-block font-weight-bold">Need Help?</span
                ><span>Call - 974493933</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Order -->
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
body {
  background-color: #eee;
}

.fs-12 {
  font-size: 12px;
}

.fs-15 {
  font-size: 15px;
}

.name {
  margin-bottom: -2px;
}

.product-details {
  margin-top: 13px;
}
</style>
