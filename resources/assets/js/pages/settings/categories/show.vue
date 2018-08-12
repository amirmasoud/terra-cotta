<template>
  <card :title="$t('category_info')" :loading="loading">
    <div class="form-group row" v-for="(value, key) in category" v-if="category">
      <label class="col-sm-4 col-form-label">{{ $t(key) }}</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" v-model="category[key]">
      </div>
    </div>
  </card>
</template>

<script>
import Form from 'vform'
import axios from 'axios'
import { mapGetters } from 'vuex'
import { content } from '~/mixins/content'

export default {
  scrollToTop: true,

  metaInfo () {
    return { title: this.$t('categories') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  mixins:[content],

  data: function () {
    return {
      category: null,
      apiUrl: '/api/settings/categories/',
      loading: true
    }
  },

  async created () {
    await this.showResource()
    this.loading = false
  }
}
</script>
