<template>
  <card :title="$t('icon_info')">
    <div class="form-group row" v-for="(index, key) in resource" v-if="resource">
      <label class="col-sm-4 col-form-label">{{ $t(key) }}</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" v-model="resource[key]">
      </div>
    </div>
  </card>
</template>

<script>
import ContentForm from './form'
import { mapGetters } from 'vuex'
import { content } from '~/mixins/content'

export default {
  scrollToTop: true,

  metaInfo () {
    return { title: this.$t(this.config('title')) }
  },

  components: {
    ContentForm,
  },

  mixins: [content],

  computed: mapGetters({
    user: 'auth/user'
  }),
}
</script>
