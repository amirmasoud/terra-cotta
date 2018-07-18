<template>
  <card :title="$t('safes')"
    :router-name="$t('create_safe')"
    :router-link="'safes.create'">
    <vuetable ref="vuetable"
      api-url="/api/safes"
      :fields="fields"
      track-by="id"
    >
      <template slot="actions" slot-scope="props">
        <div class="custom-actions">
          <b-link
            @click="$router.push({ name: 'safes.show', params: { safes: props.rowData.id }})"><fa icon="eye"></fa></b-link>
          <b-link
            @click="$router.push({ name: 'safes.edit', params: { safes: props.rowData.id }})"><fa icon="edit"></fa></b-link>
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
  },

  methods: {
    /**
     * Destroy an safe.
     *
     * @param  {integer} safeId
     * @param  {integer} index
     * @return {void}
     */
    async destroy (safeId, index) {
      await axios.delete('/api/safes/' + safeId)
      this.$refs.vuetable.refresh()
    },

    /**
     * Show confirm dialog before destroy.
     *
     * @param  {integer} safeId
     * @param  {index}   index
     * @return {void}
     */
    confirmDelete(safeId, index) {
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
          this.destroy(safeId, index)
          swal(
            this.$t('deleted!'),
            this.$t('safe_deleted'),
            'success'
          )
        }
      })
    },
  }

}
</script>
