<template>
  <card :title="$t('field_info')">
    <div class="form-group row" v-for="(value, key) in field" v-if="field">
      <label class="col-sm-4 col-form-label">{{ $t(key) }}</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" v-model="field[key]">
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
    return { title: this.$t('field') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      field: null
    }
  },

  created () {
    this.show()
  },

  methods: {
    async show () {
      const { data } = await axios.get('/api/settings/fields/' + this.$route.params.fields)
      this.field = data
    }
  }
}
</script>
