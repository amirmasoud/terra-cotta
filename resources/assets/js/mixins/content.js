import Form from 'vform'
import axios from 'axios'
import { config } from './config'
import { helper } from './helper'

export const content = {
  mixins: [config, helper],

  data () {
    return {
      domain: 'content',
      loading: true,
      form: new Form({}),
      resource: null
    }
  },

  computed: {
    api: function () {
      return this.config('api')
    },
  },

  async created () {
    await this.formReady()
    await this.showReady()
    this.loading = false
  },

  methods: {
    /**
     * Store a new resource.
     *
     * @param  {object} event
     * @return {void}
     */
    async storeResource (event) {
      let createRoute = this.$route.name.split('.')
      createRoute[createRoute.length - 1] = 'edit'
      let editRoute = createRoute.join('.')

      const { data } = await this.form.post(this.api)

      this.$router.push({ name: editRoute, params: { 'resource': data.data.id } })
    },

    /**
     * Fill a update form.
     *
     * @param  {integer|string} resourceId
     * @return {void}
     */
    async fillResource () {
      const { data } = await axios.get(this.api + this.$route.params.resource + '/edit')
      this.form.keys().forEach(key => {
        this.form[key] = data.data[key]
      })
    },

    /**
     * Update a resource and redirect after success response.
     *
     * @param  {object} event
     * @return {void}
     */
    async updateResource (event) {
      await this.form.patch(this.api + this.$route.params.resource)
    },

    /**
     * Show a resource.
     *
     * @param  {integer|string} resourceId
     * @return {void}
     */
    async showResource () {
      const { data } = await axios.get(this.api + this.$route.params.resource)
      this.resource = data.data
    },

    /**
     * Ready form for edit and create.
     *
     * @return {void}
     */
    async formReady () {
      if (['edit', 'create'].includes(this.action())) {
        // For create and edit
        let name = this.config('form').map(f => f.name)
        for (var i = name.length - 1; i >= 0; i--) {
          this.$set(this.form, name[i], '')
        }
        // For edit
        if (this.action() == 'edit') {
          await this.fillResource()
        }
      }
    },

    /**
     * Ready form for edit and create.
     *
     * @return {void}
     */
    async showReady () {
      if (['show'].includes(this.action())) {
        await this.showResource()
      }
    }
  }
}
