export default {
  computed: {
    resourceName() {
      return this.$route.params.resource.toUpperCase()
    }
  }
}
