<template>
  <form @submit.prevent="store" @keydown="form.onKeydown($event)">
    <alert-success :form="form" :message="$t('group_created')" class="mt-2" />
    <card :title="$t('create_group')">
      <!-- Label -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('label') }}</label>
        <div class="col-md-7">
          <input v-model="form.label" :class="{ 'is-invalid': form.errors.has('label') }" class="form-control" type="text" name="label">
          <has-error :form="form" field="label"/>
        </div>
      </div>

      <!-- Value -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('value') }}</label>
        <div class="col-md-7">
          <input v-model="form.value" :class="{ 'is-invalid': form.errors.has('value') }" class="form-control" type="text" name="value">
          <has-error :form="form" field="value"/>
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
            name="icon_id"
            :class="{ 'is-invalid': form.errors.has('icon_id') }"
            @selected="addIconId"
            @clear="clearIconId"
            initialValue="form.icon_id">
          </autocomplete>
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has('icon_id')" v-html="form.errors.get('icon_id')"/>
        </div>
      </div>

      <!-- Type ID -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('type_id') }}</label>
        <div class="col-md-7">
          <autocomplete
            source="/api/settings/types/search?q="
            results-property="data"
            results-display="name"
            name="type_id"
            :class="{ 'is-invalid': form.errors.has('type_id') }"
            @selected="addTypeId"
            @clear="clearTypeId"
            initialValue="form.type_id">
          </autocomplete>
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has('type_id')" v-html="form.errors.get('type_id')"/>
        </div>
      </div>

      <!-- Group ID -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('group_id') }}</label>
        <div class="col-md-7">
          <autocomplete
            source="/api/settings/groups/search?q="
            results-property="data"
            results-display="name"
            name="group_id"
            :class="{ 'is-invalid': form.errors.has('group_id') }"
            @selected="addGroupId"
            @clear="clearGroupId"
            initialValue="form.group_id">
          </autocomplete>
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has('group_id')" v-html="form.errors.get('group_id')"/>
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
import axios from 'axios'
import { mapGetters } from 'vuex'
import Autocomplete from 'vuejs-auto-complete'

export default {
  scrollToTop: true,

  metaInfo () {
    return { title: this.$t('fields') }
  },

  components: {
    Autocomplete,
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      form: new Form({
        label: '',
        value: '',
        icon_id: '',
        type_id: '',
        group_id: ''
      })
    }
  },

  methods: {
    async store () {
      await this.form.post('/api/settings/fields')

      this.form.reset()
    },

    addIconId (icon) {
      this.form.icon_id = icon.value
      this.form.errors.clear('icon_id')
    },

    clearIconId () {
      this.form.icon_id = null
    },

    addTypeId (icon) {
      this.form.type_id = icon.value
      this.form.errors.clear('type_id')
    },

    clearTypeId () {
      this.form.type_id = null
    },

    addGroupId (icon) {
      this.form.group_id = icon.value
      this.form.errors.clear('group_id')
    },

    clearGroupId () {
      this.form.group_id = null
    }
  }
}
</script>
