<template>
  <card :title="$t('categories')"
    :router-name="$t('create_category')"
    :router-link="'settings.categories.create'">
    <vuetable ref="vuetable"
      api-url="/api/settings/categories"
      :fields="fields"
    >
      <template slot="actions" slot-scope="props">
        <div class="custom-actions">
          <b-link
            @click="$router.push({ name: 'settings.categories.show', params: { categories: props.rowData.id }})"><fa icon="eye"></fa></b-link>
          <b-link
            @click="$router.push({ name: 'settings.categories.edit', params: { categories: props.rowData.id }})"><fa icon="edit"></fa></b-link>
          <b-link
            @click="confirmDelete(props.rowData.id, props.rowIndex)"><fa icon="trash"></fa></b-link>
        </div>
      </template>
    </vuetable>
  </card>
</template>

<script>
import axios from 'axios'
import swal from 'sweetalert2'
import { mapGetters } from 'vuex'
import Vuetable from 'vuetable-2/src/components/Vuetable'

export default {
  scrollToTop: true,

  components: {
    Vuetable
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
      ]
    }
  },

  methods: {
    /**
     * Destroy an category.
     *
     * @param  {integer} categoryId
     * @param  {integer} index
     * @return {void}
     */
    async destroy (categoryId, index) {
      await axios.delete('/api/settings/categories/' + categoryId)
      this.$refs.vuetable.refresh()
    },

    /**
     * Show confirm dialog before destroy.
     *
     * @param  {integer} categoryId
     * @param  {index}   index
     * @return {void}
     */
    confirmDelete(categoryId, index) {
      swal({
        title: this.$t('are_you_sure'),
        text: this.$t('delete_confirm_description'),
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: this.$t('yes_delete_it'),
      }).then((result) => {
        if (result.value) {
          this.destroy(categoryId, index)
          swal(
            this.$t('deleted!'),
            this.$t('category_deleted'),
            'success'
          )
        }
      })
    },
  }

}
</script>
