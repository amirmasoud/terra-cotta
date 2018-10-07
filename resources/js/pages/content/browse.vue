<template>
  <card :title="$t(config('title'))"
    :router-name="$t('create_' + config('singular'))"
    :router-link="'content.create'"
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
import { content } from '~/mixins/content'
import CTable from '~/components/content/Table'

export default {
  scrollToTop: true,

  components: {
    CTable
  },

  mixins: [content],

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
          name: '__slot:actions',
          title: this.$t('actions'),
        }
      ]
    }
  },

  created: function () {
    for (var i = this.config('form').length - 1; i >= 0; i--) {
      this.fields.unshift({
        name: this.config('form')[i].name,
        title: this.$t(this.config('form')[i].label)
      })
    }
  }
}
</script>
