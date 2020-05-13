<template>
  <card :title="$t(config('title'))"
    :router-name="$t('create_' + config('singular'))"
    :router-link="'safes.create'"
    :loading="loading">
    <c-table :fields="fields"
      :api-url="config('api')"
      :singular="config('singular')"
      :plural="config('title')"></c-table>
  </card>
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'
import { safe } from '~/mixins/safe'
import CTable from '~/components/content/Table'

export default {
  scrollToTop: true,

  components: {
    CTable
  },

  mixins: [safe],

  metaInfo () {
    return { title: this.$t(this.config('title')) }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      fields: [
        {
          name: 'name',
          title: this.$t('name')
        },
        {
          name: '__slot:actions',
          title: this.$t('actions'),
        }
      ]
    }
  }
}
</script>
