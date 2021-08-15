<template >
  <div>
    <h1>order page</h1>
  </div>
</template>


<script>
export default {
  components: {},
  data() {
    return {
      carts: null,

      form: {
        user_id: User.id(),
      },
    };
  },

  computed: {},

  methods: {
    allCart() {
      axios
        .post("/api/showcart", this.form)
        .then(({ data }) => (this.carts = data))
        .catch((err) => {});
    },
    MakePurchase() {
      axios
        .post("/api/confirmCart", this.form)
        .then(({ data }) => (this.carts = data))
        .catch((err) => {});
    },
  },
  created() {
    if (!User.loggedIn() || User.role() === "admin") {
      this.$router.push({ name: "/" });
    }
    this.allCart();
  },
};
</script>

<style scoped>
</style>
