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
