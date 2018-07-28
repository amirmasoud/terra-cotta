<template>
  <card :title="$t('fields')"
    :router-name="$t('create_field')"
    :router-link="'settings.fields.create'">
    <crud-table :fields="fields"
      api-url="/api/settings/fields/"
      singular="field"
      plural="fields"></crud-table>
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
    return { title: this.$t('fields') }
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
          name: 'lable',
        },
        {
          name: 'value',
        },
        {
          name: 'icon_id',
        },
        {
          name: 'type_id',
        },
        {
          name: 'group_id',
        },
        {
          name: 'safe_id',
        },
        {
          name: '__slot:actions',
          title: this.$t('actions'),
        }
      ]
    }
  },
}
</script>
