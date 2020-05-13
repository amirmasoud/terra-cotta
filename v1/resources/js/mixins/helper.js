export const helper = {
  methods: {
    /**
     * Get current route action.
     *
     * @return {string}
     */
    action () {
      return this.$route.name.split('.').slice(-1)[0]
    }
  }
}
