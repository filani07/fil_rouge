<template >
  <!-- Sidebar -->
  <nav id="sidebar" style="display: none">
    <ul
      class="navbar-nav sidebar sidebar-light accordion"
      id="accordionSidebar"
    >
      <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="index.html"
      >
        <div class="sidebar-brand-icon">
          <img src="{{ asset('assets/img/logo/logo2.png') }}" />
        </div>
        <div class="sidebar-brand-text mx-3">MyEcom</div>
      </a>
      <hr class="sidebar-divider my-0" />
      <li class="nav-item active">
        <router-link class="nav-link" to="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </router-link>
      </li>
      <hr class="sidebar-divider" />
      <div class="sidebar-heading">Features</div>
      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseBootstrap"
          aria-expanded="true"
          aria-controls="collapseBootstrap"
        >
          <i class="fas fa-users"></i>
          <span>Employee</span>
        </a>
        <div
          id="collapseBootstrap"
          class="collapse"
          aria-labelledby="headingBootstrap"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/store-employee"
              >Add Employee</router-link
            >
            <router-link class="collapse-item" to="/employee"
              >All Employee</router-link
            >
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseBootstrap1"
          aria-expanded="true"
          aria-controls="collapseBootstrap1"
        >
          <i class="fas fa-dolly-flatbed"></i>
          <span>Suppliers</span>
        </a>
        <div
          id="collapseBootstrap1"
          class="collapse"
          aria-labelledby="headingBootstrap"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/store-supplier"
              >Add Suppliers</router-link
            >
            <router-link class="collapse-item" to="/supplier"
              >All Suppliers</router-link
            >
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseBootstrap2"
          aria-expanded="true"
          aria-controls="collapseBootstrap2"
        >
          <i class="fab fa-buffer"></i>
          <span>Category</span>
        </a>
        <div
          id="collapseBootstrap2"
          class="collapse"
          aria-labelledby="headingBootstrap"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/store-category"
              >Add Category</router-link
            >
            <router-link class="collapse-item" to="/category"
              >All Category</router-link
            >
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#collapseBootstrap3"
          aria-expanded="true"
          aria-controls="collapseBootstrap3"
        >
          <i class="fas fa-cube"></i>
          <span>Product</span>
        </a>
        <div
          id="collapseBootstrap3"
          class="collapse"
          aria-labelledby="headingBootstrap"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/store-product"
              >Add Product</router-link
            >
            <router-link class="collapse-item" to="/product"
              >All Product</router-link
            >
          </div>
        </div>
      </li>

      <hr class="sidebar-divider" />
    </ul>
  </nav>
  <!-- Sidebar -->
</template>


<script>
export default {
  components: {},
};
</script>

<style scoped>
</style>
