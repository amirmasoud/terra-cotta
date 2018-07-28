<template>
  <card :title="$t('groups')"
    :router-name="$t('create_group')"
    :router-link="'settings.groups.create'">
    <crud-table :fields="fields"
      api-url="/api/settings/groups/"
      singular="group"
      plural="groups"></crud-table>
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
    return { title: this.$t('groups') }
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
          name: 'icon_id',
        },
        {
          name: '__slot:actions',
          title: this.$t('actions'),
        }
      ],
    }
  }
}
</script>
