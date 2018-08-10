<template>
  <card :title="$t('types')"
    :router-name="$t('create_type')"
    :router-link="'settings.types.create'">
    <crud-table :fields="fields"
      api-url="/api/settings/types/"
      singular="type"
      plural="types"></crud-table>
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
    return { title: this.$t('types') }
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
