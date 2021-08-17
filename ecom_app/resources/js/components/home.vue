<template >
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Order -->
            <div class="containero">
              <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                  <div class="receipt bg-white p-3 rounded">
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
                        ><span class="font-weight-bold">{{
                          ordersDetails.orderDate
                        }}</span>
                      </div>
                    </div>
                    <hr />
                    <div
                      class="
                        d-flex
                        justify-content-between
                        align-items-center
                        product-details
                        mt-4
                      "
                      v-for="orderD in ordersDetails[0]"
                      :key="orderD.id"
                    >
                      <div class="d-flex flex-row product-name-image">
                        <img class="rounded" :src="orderD.image" width="80" />
                        <div
                          class="
                            d-flex
                            flex-column
                            justify-content-between
                            ml-2
                          "
                        >
                          <div>
                            <span class="d-block font-weight-bold p-name">{{
                              orderD.product_name
                            }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="product-price">
                        <h6>${{ orderD.selling_price }}</h6>
                      </div>
                    </div>

                    <div class="mt-5 amount row">
                      <div class="d-flex justify-content-center col-md-6"></div>
                      <div class="col-md-6">
                        <div class="billing">
                          <hr />
                          <div class="d-flex justify-content-between mt-1">
                            <span class="font-weight-bold">Total</span
                            ><span class="font-weight-bold text-success"
                              >${{ ordersDetails.total }}</span
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Order -->
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                  Earnings
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  ${{ revenue.total }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-money-check-alt fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                  Orders
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  {{ orders.confirm }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-chart-pie fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                  Users
                </div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                  {{ orders.users }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                  Add to Cart
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  {{ orders.pending }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Row-->
    <div class="row">
      <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
          <div
            class="
              card-header
              py-3
              d-flex
              flex-row
              align-items-center
              justify-content-between
            "
          >
            <h6 class="m-0 font-weight-bold text-primary">Orders Table</h6>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="order in orders[0]" :key="order.id">
                  <td>{{ order.id }}</td>
                  <td>{{ order.name }}</td>
                  <td>{{ order.phone }}</td>
                  <td>{{ order.email }}</td>
                  <td>{{ order.address }}</td>
                  <td v-if="order.status == 'pending'">
                    <span class="badge badge-warning">Pending</span>
                  </td>
                  <td v-if="order.status == 'confirm'">
                    <span class="badge badge-success">Confirmed</span>
                  </td>
                  <td>
                    <button
                      class="btn btn-sm btn-primary"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      @click="findOrder(order.id)"
                    >
                      Detail
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      revenue: "",
      orders: [],
      ordersDetails: [],
    };
  },
  methods: {
    allOrder() {
      axios
        .get("/api/order")
        .then(({ data }) => (this.orders = data))
        .catch((err) => {});
    },
    earning() {
      axios
        .get("/api/earning")
        .then(({ data }) => (this.revenue = data))
        .catch((err) => {});
    },
    findOrder(id) {
      axios
        .post("/api/findOrder", { order_id: id })
        .then(({ data }) => (this.ordersDetails = data))
        .catch((err) => {});
    },
  },

  created() {
    if (!User.loggedIn() || User.role() === "client") {
      this.$router.push({ name: "/" });
    }
    this.allOrder();
    this.earning();
  },
};
</script>

<style scoped>
</style>