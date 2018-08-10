<template>
  <card :title="$t('tags')"
    :router-name="$t('create_tag')"
    :router-link="'settings.tags.create'">
    <crud-table :fields="fields"
      api-url="/api/settings/tags/"
      singular="tag"
      plural="tags"></crud-table>
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
    return { title: this.$t('tags') }
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
          name: 'color',
          title: this.$t('color')
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
