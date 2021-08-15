<template >
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button>
        </form>
      </div>
    </nav>
    <div class="container-fluid mt-100" v-if="carts.cartItem == 0">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5>Cart</h5>
            </div>
            <div class="card-body cart">
              <div class="col-sm-12 empty-cart-cls text-center">
                <img
                  src="assets/shopping/empty_card.png"
                  width="130"
                  height="130"
                  class="img-fluid mb-4 mr-3"
                />
                <h3><strong>Your Cart is Empty</strong></h3>
                <h4>Add something to your cart :)</h4>
                <router-link
                  to="/shop"
                  class="btn btn-primary cart-btn-transform m-3"
                  data-abc="true"
                  >continue shopping</router-link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid" v-if="carts.cartItem != 0">
      <div class="row">
        <aside class="col-lg-9">
          <div class="card">
            <div class="table-responsive">
              <table class="table table-borderless table-shopping-cart">
                <thead class="text-muted">
                  <tr class="small text-uppercase">
                    <th scope="col">Product</th>
                    <th scope="col" width="120">Price</th>
                    <th
                      scope="col"
                      class="text-right d-none d-md-block"
                      width="200"
                    ></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="cart in carts[0]" :key="cart.id">
                    <td>
                      <figure class="itemside align-items-center">
                        <div class="aside">
                          <img :src="cart.image" class="img-sm" />
                        </div>
                        <figcaption class="info">
                          <a href="#" class="title text-dark" data-abc="true">{{
                            cart.product_name
                          }}</a>
                          <p class="text-muted small">Brand: MAXTRA</p>
                        </figcaption>
                      </figure>
                    </td>

                    <td>
                      <div class="price-wrap">
                        <var class="price">${{ cart.selling_price }}</var>
                      </div>
                    </td>
                    <td class="text-right d-none d-md-block">
                      <div
                        href=""
                        class="btn btn-light"
                        data-abc="true"
                        @click="deleteCart(cart.id)"
                      >
                        Remove
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </aside>
        <aside class="col-lg-3 mb-5">
          <div class="card mb-3">
            <div class="card-body">
              <dl class="dlist-align">
                <dt>Name:</dt>
                <dd class="text-right b ml-3">
                  <strong>{{ Cartuser[0].name }}</strong>
                </dd>
              </dl>

              <dl class="dlist-align">
                <dt>Email:</dt>
                <dd class="text-right b ml-3">
                  <strong>{{ Cartuser[0].email }}</strong>
                </dd>
              </dl>
              <dl class="dlist-align">
                <dt>Phone:</dt>
                <dd class="text-right b ml-3">
                  <strong>{{ Cartuser[0].phone }}</strong>
                </dd>
              </dl>
              <br />
              <hr />
              <br />
              <dl class="dlist-align">
                <dt>Address:</dt>
                <dd class="text-right b ml-3">
                  <strong>{{ Cartuser[0].address }}</strong>
                </dd>
              </dl>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <dl class="dlist-align">
                <dt>item:</dt>
                <dd class="text-right ml-3">{{ carts.cartItem }}</dd>
              </dl>

              <dl class="dlist-align">
                <dt>Total price:</dt>
                <dd class="text-right text-dark b ml-3">
                  <strong>${{ carts.total.toFixed(2) }}</strong>
                </dd>
              </dl>
              <hr />

              <a
                href="#"
                class="btn btn-out btn-success btn-square btn-main mt-2"
                data-abc="true"
                @click="MakePurchase"
              >
                Make Purchase
              </a>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</template>


<script>
import Swal from "sweetalert2";

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

    deleteCart(id) {
      axios
        .delete("/api/cart/" + id)
        .then(({ data }) => {
          this.carts = data;
          this.allCart();
        })
        .catch((err) => {});
    },

    UserCart() {
      axios
        .post("/api/getCartUser", this.form)
        .then(({ data }) => (this.Cartuser = data))
        .catch((err) => {});
    },

    MakePurchase() {
      axios
        .post("/api/confirmCart", this.form)
        .then(() => {
          this.$router.push({ name: "order" });
        })
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
@import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");

body {
  background-color: #eeeeee;
  font-family: "Open Sans", serif;
  font-size: 14px;
}

.container-fluid {
  margin-top: 70px;
}

.card-body {
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1.4rem;
}

.img-sm {
  width: 80px;
  height: 80px;
}

.itemside .info {
  padding-left: 15px;
  padding-right: 7px;
}

.table-shopping-cart .price-wrap {
  line-height: 1.2;
}

.table-shopping-cart .price {
  font-weight: bold;
  margin-right: 5px;
  display: block;
}

.text-muted {
  color: #969696 !important;
}

a {
  text-decoration: none !important;
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
  border-radius: 0px;
}

.itemside {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
}

.dlist-align {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

[class*="dlist-"] {
  margin-bottom: 5px;
}

.coupon {
  border-radius: 1px;
}

.price {
  font-weight: 600;
  color: #212529;
}

.btn.btn-out {
  outline: 1px solid #fff;
  outline-offset: -5px;
}

.btn-main {
  border-radius: 2px;
  text-transform: capitalize;
  font-size: 15px;
  padding: 10px 19px;
  cursor: pointer;
  color: #fff;
  width: 100%;
}

.btn-light {
  color: #ffffff;
  background-color: #f44336;
  border-color: #f8f9fa;
  font-size: 12px;
}

.btn-light:hover {
  color: #ffffff;
  background-color: #f44336;
  border-color: #f44336;
}

.btn-apply {
  font-size: 11px;
}

/* empty cart  */
@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

body {
  background-color: #eee;
  font-family: "Calibri", sans-serif !important;
}

.mt-100 {
  margin-top: 100px;
}

.card {
  margin-bottom: 30px;
  border: 0;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
  letter-spacing: 0.5px;
  border-radius: 8px;
  -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, 0.05);
  box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, 0.05);
}

.card .card-header {
  background-color: #fff;
  border-bottom: none;
  padding: 24px;
  border-bottom: 1px solid #f6f7fb;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
}

.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card .card-body {
  padding: 30px;
  background-color: transparent;
}

.btn-primary,
.btn-primary.disabled,
.btn-primary:disabled {
  background-color: #4466f2 !important;
  border-color: #4466f2 !important;
}
</style>
