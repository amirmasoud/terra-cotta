<template>
  <form @submit.prevent="storeResource" @keydown="form.onKeydown($event)">
    <alert-success :form="form" :message="$t(config('singular') + '_created')" class="mt-2"/>
    <card :title="$t('create_' + config('singular'))" :loading="loading">
      <content-form :form="form"
        :fields="config('form')"
        v-if="formReady"
      ></content-form>
    </card>
  </form>
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
