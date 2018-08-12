<template>
  <form @submit.prevent="storeResource('settings.categories.browse')" @keydown="form.onKeydown($event)">
    <alert-success :form="form" :message="$t('category_created')" class="mt-2" />
    <card :title="$t('create_category')">
      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
          <has-error :form="form" field="name"/>
        </div>
      </div>

      <!-- Icon ID -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('icon_id') }}</label>
        <div class="col-md-7">
          <autocomplete
            source="/api/settings/icons/search?q="
            results-property="data"
            results-display="name"
            input-class="form-control"
            name="icon_id"
            :class="{ 'is-invalid': form.errors.has('icon_id') }"
            @selected="addResourceId('icon_id', $event)"
            @clear="clearResourceId('icon_id')"
            initialValue="form.icon_id">
          </autocomplete>
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has('icon_id')" v-html="form.errors.get('icon_id')"/>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-auto">
          <v-button :loading="form.busy" type="success">{{ $t('create') }}</v-button>
        </div>
      </div>
    </card>
  </form>
</template>

<script>
import Form from 'vform'
import { mapGetters } from 'vuex'
import { content } from '~/mixins/content'
import Autocomplete from 'vuejs-auto-complete'

export default {
  scrollToTop: true,

  metaInfo () {
    return { title: this.$t('categories') }
  },

  components: {
    Autocomplete,
  },

  mixins:[content],

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      form: new Form({
        name: '',
        icon_id: ''
      }),
      apiUrl: '/api/settings/categories/'
    }
  },
}
</script>
