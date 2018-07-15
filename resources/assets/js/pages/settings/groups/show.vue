<template>
  <card :title="$t('group_info')">
    <div class="form-group row" v-for="(value, key) in group" v-if="group">
      <label class="col-sm-4 col-form-label">{{ $t(key) }}</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" v-model="group[key]">
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
    return { title: this.$t('group') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      group: null
    }
  },

  created () {
    this.show()
  },

  methods: {
    async show () {
      const { data } = await axios.get('/api/settings/groups/' + this.$route.params.groups)
      this.group = data
    }
  }
}
</script>
