import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'

import '~/plugins'
import '~/components'

Vue.config.productionTip = false

Vue.mixin({
  methods: {
    can (permission) {
      return (this.$store.getters['auth/user'].permissions || []).find(o => o.name === permission) !== undefined
    },

    cannot (permission) {
      return (this.$store.getters['auth/user'].permissions || []).find(o => o.name === permission) === undefined
    },

    hasAny (...permissions) {
      for (let permission of permissions) {
        if (this.can(permission)) {
          return true
        }
      }
      return false
    },

    hasNone (...permissions) {
      for (let permission of permissions) {
        if (this.can(permission)) {
          return false
        }
      }
      return true
    }
  }
})

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
