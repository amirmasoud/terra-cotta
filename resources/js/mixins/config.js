import t from 'typy'
import contentConfig from '~/config/content.json'
import safeConfig from '~/config/safe.json'

export const config = {
  data: function () {
    return {
      content: contentConfig,
      safe: safeConfig,
    }
  },

  methods: {
    /**
     * Get config key by domain.
     *
     * @param  {string} key
     * @return {string}
     */
    config(key) {
      return t(this[this.domain][this.$route.params.content || this.content], key).safeObject
    },
  }
}
