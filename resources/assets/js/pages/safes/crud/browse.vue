<template>
  <card :title="$t('safes')"
    :router-name="$t('create_safe')"
    :router-link="'safes.create'">
    <crud-table :fields="fields"
      api-url="/api/safes/"
      singular="safe"
      plural="safes"></crud-table>
  </card>
</template>

<script>
import { mapGetters } from 'vuex'
import CrudTable from '~/components/crud/CrudTable'

export default {
  scrollToTop: true,

  components: {
    CrudTable
  },

  metaInfo () {
    return { title: this.$t('safes') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      fields: [
        {
          name: '__checkbox'
        },
        {
          name: 'name',
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
