<template>
  <card :title="$t('safe_info')">
    <div class="form-group row" v-for="(value, key) in safe" v-if="safe">
      <label class="col-sm-4 col-form-label">{{ $t(key) }}</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" v-model="safe[key]">
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
    return { title: this.$t('safes') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      safe: null
    }
  },

  created () {
    this.show()
  },

  methods: {
    async show () {
      const { data } = await axios.get('/api/safes/' + this.$route.params.safes)
      this.safe = data
    }
  }
}
</script>
