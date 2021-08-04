<template >
  <div>
    <div class="row">
      <router-link to="/store-employee" class="btn btn-primary"
        >Add Employee
      </router-link>
    </div>
    <br />
    <input
      type="text"
      class="form-control"
      v-model="searchTerm"
      placeholder="Search Here"
      style="width: 300px"
    />
    <br />
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
            <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Phone Number</th>
                  <th>Sallery</th>
                  <th>Joining Dste</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="empolyee in filterSearch" :key="empolyee.id">
                  <td>{{ empolyee.name }}</td>
                  <td><img :src="empolyee.photo" alt="" id="m_photo" /></td>
                  <td>{{ empolyee.phone }}</td>
                  <td>{{ empolyee.sallery }}</td>
                  <td>{{ empolyee.joining_date }}</td>
                  <td>
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
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
      employees: [],
      searchTerm: "",
    };
  },

  computed: {
    filterSearch() {
      return this.employees.filter((empolyee) => {
        return empolyee.phone.match(this.searchTerm);
      });
    },
  },
  methods: {
    allEmplyee() {
      axios
        .get("/api/employee")
        .then(({ data }) => (this.employees = data))
        .catch((err) => {});
    },
  },
  created() {
    this.allEmplyee();
  },
};
</script>

<style scoped>
#m_photo {
  height: 40px;
  width: 40px;
}
</style>
