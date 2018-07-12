<template>
  <card :title="$t('tag_info')">
    <div class="form-group row" v-for="(value, key) in tag" v-if="tag">
      <label class="col-sm-4 col-form-label">{{ $t(key) }}</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" v-model="tag[key]">
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
    return { title: this.$t('tags') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      tag: null
    }
  },

  created () {
    this.show()
  },

  methods: {
    async show () {
      const { data } = await axios.get('/api/settings/tags/' + this.$route.params.tags)
      this.tag = data
    }
  }
}
</script>
