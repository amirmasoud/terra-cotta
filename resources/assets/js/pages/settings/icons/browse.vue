<template>
  <card :title="$t('icons')"
    :router-name="$t('create_icon')"
    :router-link="'settings.icons.create'">
    <vuetable ref="vuetable"
      api-url="/api/settings/icons"
      :fields="fields"
    >
      <template slot="actions" slot-scope="props">
        <div class="custom-actions">
          <b-link
            @click="$router.push({ name: 'settings.icons.show', params: { icons: props.rowData.id }})"><fa icon="eye"></fa></b-link>
          <b-link
            @click="$router.push({ name: 'settings.icons.edit', params: { icons: props.rowData.id }})"><fa icon="edit"></fa></b-link>
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
    return { title: this.$t('icons') }
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
          name: 'class',
        },
        {
          name: 'markup',
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
     * Destroy an icon.
     *
     * @param  {integer} iconId
     * @param  {integer} index
     * @return {void}
     */
    async destroy (iconId, index) {
      await axios.delete('/api/settings/icons/' + iconId)
      this.$refs.vuetable.refresh()
    },

    /**
     * Show confirm dialog before destroy.
     *
     * @param  {integer} iconId
     * @param  {index}   index
     * @return {void}
     */
    confirmDelete(iconId, index) {
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
          this.destroy(iconId, index)
          swal(
            this.$t('deleted!'),
            this.$t('icon_deleted'),
            'success'
          )
        }
      })
    },
  }

}
</script>
