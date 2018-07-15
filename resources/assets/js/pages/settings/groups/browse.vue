<template>
  <card :title="$t('groups')"
    :router-name="$t('create_group')"
    :router-link="'settings.groups.create'">
    <vuetable ref="vuetable"
      api-url="/api/settings/groups"
      :fields="fields"
    >
      <template slot="actions" slot-scope="props">
        <div class="custom-actions">
          <b-link
            @click="$router.push({ name: 'settings.groups.show', params: { groups: props.rowData.id }})"><fa icon="eye"></fa></b-link>
          <b-link
            @click="$router.push({ name: 'settings.groups.edit', params: { groups: props.rowData.id }})"><fa icon="edit"></fa></b-link>
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
      ]
    }
  },

  methods: {
    /**
     * Destroy an group.
     *
     * @param  {integer} groupId
     * @param  {integer} index
     * @return {void}
     */
    async destroy (groupId, index) {
      await axios.delete('/api/settings/groups/' + groupId)
      this.$refs.vuetable.refresh()
    },

    /**
     * Show confirm dialog before destroy.
     *
     * @param  {integer} groupId
     * @param  {index}   index
     * @return {void}
     */
    confirmDelete(groupId, index) {
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
          this.destroy(groupId, index)
          swal(
            this.$t('deleted!'),
            this.$t('group_deleted'),
            'success'
          )
        }
      })
    },
  }

}
</script>
