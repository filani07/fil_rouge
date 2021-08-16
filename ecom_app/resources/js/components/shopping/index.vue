<template >
  <div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light border rounded">
      <a class="navbar-brand" href="#!">
        <img src="assets/img/logo/logo1.png" height="30" alt="mdb logo" />
      </a>

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

    <div class="container d-flex justify-content-center mt-50 mb-50">
      <div class="row">
        <div
          class="col-md-4 mt-2"
          v-for="product in filterSearch"
          :key="product.id"
        >
          <div class="card">
            <div class="card-body">
              <div class="card-img-actions">
                <img
                  :src="product.image"
                  class="card-img img-fluid"
                  width="96"
                  height="350"
                  alt=""
                />
              </div>
            </div>
            <div class="card-body bg-light text-center">
              <div class="mb-2">
                <h6 class="font-weight-semibold mb-2">
                  <a href="#" class="text-default mb-2" data-abc="true">{{
                    product.product_name
                  }}</a>
                </h6>
                <a href="#" class="text-muted" data-abc="true">{{
                  product.category_name
                }}</a>
              </div>
              <h3 class="mb-0 font-weight-semibold">
                {{ product.selling_price }}
              </h3>
              <div>
                <i class="fa fa-star star"></i> <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i> <i class="fa fa-star star"></i>
              </div>
              <div class="text-muted mb-3">34 reviews</div>
              <button
                type="button"
                class="btn bg-cart"
                @click="AddTocart(product.id)"
              >
                <i class="fa fa-cart-plus mr-2"></i> Add to cart
              </button>
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
      products: [],
      carts: null,
      searchTerm: "",
      form: {
        user_id: User.id(),
        product_id: null,
      },
    };
  },

  computed: {
    filterSearch() {
      return this.products.filter((product) => {
        return product.product_name.match(this.searchTerm);
      });
    },
  },

  methods: {
    allCart() {
      axios
        .post("/api/showcart", this.form)
        .then(({ data }) => (this.carts = data))
        .catch((err) => {});
    },
    allProduct() {
      axios
        .get("/api/product")
        .then(({ data }) => (this.products = data))
        .catch((err) => {});
    },
    AddTocart(id) {
      this.form.product_id = id;
      axios
        .post("/api/cart", this.form)
        .then(() => {
          this.allCart();
        })
        .catch((err) => {});
    },
  },
  created() {
    if (!User.loggedIn() || User.role() === "admin") {
      this.$router.push({ name: "/" });
    }
    this.allProduct();
    this.allCart();
  },
};
</script>

<style scoped>
body {
  margin: 0;
  font-family: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji",
    "Segoe UI Symbol", "Noto Color Emoji";
  font-size: 0.8125rem;
  font-weight: 400;
  line-height: 1.5385;
  color: #333;
  text-align: left;
  background-color: #2196f3;
}

.mt-50 {
  margin-top: 50px;
}

.mb-50 {
  margin-bottom: 50px;
}

.card {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.1875rem;
}

.card-img-actions {
  position: relative;
}

.card-body {
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1.25rem;
  text-align: center;
}

.card-img {
  width: 350px;
}

.star {
  color: red;
}

.bg-cart {
  background-color: orange;
  color: #fff;
}

.bg-cart:hover {
  color: #fff;
}

.bg-buy {
  background-color: green;
  color: #fff;
  padding-right: 29px;
}

.bg-buy:hover {
  color: #fff;
}

a {
  text-decoration: none !important;
}
</style>
