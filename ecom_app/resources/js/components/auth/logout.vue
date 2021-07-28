<template ></template>

<script>
import Swal from "sweetalert2";
export default {
  created() {
    // localStorage.removeItem("token");
    // localStorage.removeItem("user");
    User.clearToken();

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
      title: "Logout successfully",
    });

    this.$router.push({ name: "/" });
  },
};
</script>

<style scoped>
</style>
