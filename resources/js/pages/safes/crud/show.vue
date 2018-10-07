<template>
  <card :title="$t('safe_info')">
    <div class="form-group row" v-for="(value, key) in resource" v-if="resource">
      <label class="col-sm-4 col-form-label">{{ $t(key) }}</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" v-model="resource[key]">
      </div>
    </div>
  </card>
</template>

<script>
import ContentForm from '~/pages/content/form'
import { safe } from '~/mixins/safe'
import { mapGetters } from 'vuex'

export default {
  scrollToTop: true,

  mixins: [safe],

  components: {
    ContentForm,
  },

  metaInfo () {
    return { title: this.$t(this.config('title')) }
  },

  computed: mapGetters({
    user: 'auth/user'
  })
}
</script>
