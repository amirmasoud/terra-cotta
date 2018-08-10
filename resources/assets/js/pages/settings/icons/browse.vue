<template>
  <card :title="$t('icons')"
    :router-name="$t('create_icon')"
    :router-link="'settings.icons.create'">
    <crud-table :fields="fields"
      api-url="/api/settings/icons/"
      singular="icon"
      plural="icons"></crud-table>
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
    return { title: this.$t('icons') }
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
          name: 'class',
          title: this.$t('class')
        },
        {
          name: 'markup',
          title: this.$t('markup')
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
