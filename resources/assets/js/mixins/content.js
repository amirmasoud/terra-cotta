import axios from 'axios'

export const content = {
  methods:{
    /**
     * Store a new resource.
     *
     * @param  {string} next
     * @return {void}
     */
    async storeResource (next = null) {
      await this.form.post(this.apiUrl)
      this.stayOrRedirect(next)
    },

    /**
     * Add resource ID from autocomplete component.
     *
     * @param {string} name
     * @param {object} resource
     * @return {void}
     */
    addResourceId(name, resource) {
      this.form[name] = resource.value
      this.form.errors.clear(name)
    },

    /**
     * Clear selected item of autocomplete component.
     *
     * @param  {string} name
     * @return {void}
     */
    clearResourceId (name) {
      this.form[name] = null
    },

    /**
     * Fill a update form.
     *
     * @return {void}
     */
    async fillResource () {
      const { data } = await axios.get(this.apiUrl + this.$route.params.categories + '/edit')
      this.form.keys().forEach(key => {
        this.form[key] = data[key]
      })
    },

    /**
     * Fill an autocomplete name and id.
     *
     * @param  {string} resourceId
     * @param  {string} intialDisplay
     * @param  {string} api
     * @return {void}
     */
    async fillResourceName (resourceId, intialDisplay, api) {
      if (this.form[resourceId]) {
        const { data } = await axios.get(api + this.form[resourceId])
        this[intialDisplay] = data.name
      } else {
        this[intialDisplay] = ''
        this.form[resourceId] = null
      }
    },

    /**
     * Update a resource and redirect after success response.
     *
     * @param  {string} next
     * @return {void}
     */
    async updateResource (next = null) {
      await this.form.patch(this.apiUrl + this.$route.params.categories)
      this.stayOrRedirect(next)
    },

    /**
     * Show and resource.
     *
     * @return {void}
     */
    async showResource () {
      const { data } = await axios.get(this.apiUrl + this.$route.params.categories)
      this.category = data
    },

    /**
     * Stay in current page or redirect to next page.
     *
     * @param  {string|null} next
     * @return {void}
     */
    stayOrRedirect (next = null) {
      if (next) {
        this.$router.push({ name: next })
      } else {
        this.form.reset()
      }
    }
  }
}
