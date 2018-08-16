import axios from 'axios'
import { content } from './content'

export const safe = {
  mixins: [content],

  data () {
    return {
      domain: 'safe',
      content: 'safes'
    }
  },

  methods: {
    /**
     * Show a resource.
     *
     * @param  {integer|string} resourceId
     * @return {void}
     */
    async showResource () {
      const { data } = await axios.get(this.api + this.$route.params.safes)
      this.resource = data
    },

    /**
     * Store a new resource.
     *
     * @param  {object} event
     * @return {void}
     */
    async fillResource (event) {
      const { data } = await axios.get('/api/safes/' + this.$route.params.safes + '/edit')

      this.form.keys().forEach(key => {
        this.form[key] = data[key]
      })

      this.tags = []
      this.categories = []

      // Fill tags
      for (var i = data.tags.length - 1; i >= 0; i--) {
        this.tags.push({ 'text': data.tags[i].name })
        this.form.tags = []
        this.form.tags.push(data.tags[i].name)
      }

      // Fill categories
      for (var i = data.categories.length - 1; i >= 0; i--) {
        this.categories.push({ 'text': data.categories[i].name })
        this.form.categories = []
        this.form.categories.push(data.categories[i].name)
      }

      this.loading = false
    }
  }
}
