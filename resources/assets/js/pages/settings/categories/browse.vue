<template>
  <card :title="$t('categories')"
    :router-name="$t('create_category')"
    :router-link="'settings.categories.create'">
    <crud-table :fields="fields"
      api-url="/api/settings/categories/"
      singular="category"
      plural="categories"></crud-table>
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
    return { title: this.$t('categories') }
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
          name: 'icon_id',
          title: this.$t('icon_id')
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
