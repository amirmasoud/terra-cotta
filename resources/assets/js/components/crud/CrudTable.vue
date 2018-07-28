<template>
  <div>
    <vuetable ref="vuetable"
      :api-url="apiUrl"
      :fields="fields"
      :pagination-path="paginationPath"
      @vuetable:pagination-data="onPaginationData"
    >
      <template slot="actions" slot-scope="props">
        <slot name="actions">
          <div class="custom-actions">
            <b-link
              @click="$router.push({ name: 'settings.' + plural + '.show', params: { [plural]: props.rowData.id }})"><fa icon="eye"></fa></b-link>
            <b-link
              @click="$router.push({ name: 'settings.' + plural + '.edit', params: { [plural]: props.rowData.id }})"><fa icon="edit"></fa></b-link>
            <b-link
              @click="confirmDelete(props.rowData.id, props.rowIndex)"><fa icon="trash"></fa></b-link>
          </div>
        </slot>
      </template>
    </vuetable>
    <b-row>
      <b-col>
        <vuetable-pagination-info ref="paginationInfo"
        ></vuetable-pagination-info>
      </b-col>
      <b-col>
        <vuetable-pagination ref="pagination"
          @vuetable-pagination:change-page="onChangePage"
          :css="css.pagination"
        ></vuetable-pagination>
      </b-col>
    </b-row>
  </div>
</template>
<script>
import axios from 'axios'
import swal from 'sweetalert2'
import { mapGetters } from 'vuex'
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from '../vuetable/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'

export default {
  scrollToTop: true,

  name: 'CrudTable',

  components: {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo
  },

  metaInfo () {
    return { title: this.$t(this.plural) }
  },

  props: {
    apiUrl: { type: String },
    fields: { type: Array },
    paginationPath: { type: String, default: '' },
    singular: { type: String },
    plural: { type: String }
  },

  data: function () {
    return {
      css: {
        pagination: {
          wrapperClass: 'pagination pagination-sm justify-content-end',
          activeClass: 'active',
          disabledClass: 'disabled',
          pageClass: 'page-item',
          linkClass: 'page-link',
          icons: {
            first: '',
            prev: '',
            next: '',
            last: '',
          },
        }
      }
    }
  },

  methods: {
    /**
     * Destroy a resource.
     *
     * @param  {integer} resourceId
     * @param  {integer} index
     * @return {void}
     */
    async destroy (resourceId, index) {
      await axios.delete(this.apiUrl + resourceId)
      this.$refs.vuetable.refresh()
    },

    /**
     * Show confirm dialog before destroy.
     *
     * @param  {integer} resourceId
     * @param  {integer}   index
     * @return {void}
     */
    confirmDelete(resourceId, index) {
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
          this.destroy(resourceId, index)
          swal(
            this.$t('deleted!'),
            this.$t(this.singular + '_deleted'),
            'success'
          )
        }
      })
    },

    /**
     * Change data on pagination change.
     * @param  {[type]} paginationData
     * @return {void}
     */
    onPaginationData (paginationData) {
      this.$refs.pagination.setPaginationData(paginationData)
      this.$refs.paginationInfo.setPaginationData(paginationData)
    },

    /**
     * On page change
     * @param  {[type]} page
     * @return {void}
     */
    onChangePage (page) {
      this.$refs.vuetable.changePage(page)
    }
  }

}
</script>
