<template>
  <card :title="$t('icon_info')">
    <div class="form-group row" v-for="(value, key) in icon" v-if="icon">
      <label class="col-sm-4 col-form-label">{{ $t(key) }}</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" v-model="icon[key]">
      </div>
    </div>
  </card>
</template>

<script>
import Form from 'vform'
import axios from 'axios'
import { mapGetters } from 'vuex'

export default {
  scrollToTop: true,

  metaInfo () {
    return { title: this.$t('icons') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      icon: null
    }
  },

  created () {
    this.show()
  },

  methods: {
    async show () {
      const { data } = await axios.get('/api/settings/icons/' + this.$route.params.icons)
      this.icon = data
    }
  }
}
</script>
