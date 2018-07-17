<template>
  <card :title="$t('fields')"
    :router-name="$t('create_field')"
    :router-link="'settings.fields.create'">
    <vuetable ref="vuetable"
      api-url="/api/settings/fields"
      :fields="fields"
    >
      <template slot="actions" slot-scope="props">
        <div class="custom-actions">
          <b-link
            @click="$router.push({ name: 'settings.fields.show', params: { fields: props.rowData.id }})"><fa icon="eye"></fa></b-link>
          <b-link
            @click="$router.push({ name: 'settings.fields.edit', params: { fields: props.rowData.id }})"><fa icon="edit"></fa></b-link>
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
          name: '__slot:actions',
          title: this.$t('actions'),
        }
      ]
    }
  },

  methods: {
    /**
     * Destroy an field.
     *
     * @param  {integer} fieldId
     * @param  {integer} index
     * @return {void}
     */
    async destroy (fieldId, index) {
      await axios.delete('/api/settings/fields/' + fieldId)
      this.$refs.vuetable.refresh()
    },

    /**
     * Show confirm dialog before destroy.
     *
     * @param  {integer} fieldId
     * @param  {index}   index
     * @return {void}
     */
    confirmDelete(fieldId, index) {
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
          this.destroy(fieldId, index)
          swal(
            this.$t('deleted!'),
            this.$t('field_deleted'),
            'success'
          )
        }
      })
    },
  }

}
</script>
