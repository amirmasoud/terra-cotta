<template>
  <form @submit.prevent="store" @keydown="form.onKeydown($event)">
    <alert-success :form="form" :message="$t('group_created')" class="mt-2" />
    <card :title="$t('create_group')">
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
            name="icon_id"
            :class="{ 'is-invalid': form.errors.has('icon_id') }"
            @selected="addIconId"
            @clear="clearIconId"
            initialValue="form.icon_id">
          </autocomplete>
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has('icon_id')" v-html="form.errors.get('icon_id')"/>
        </div>
      </div>

      <!-- Safe ID -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('safe_id') }}</label>
        <div class="col-md-7">
          <autocomplete
            source="/api/safes/search?q="
            results-property="data"
            results-display="name"
            name="safe_id"
            :class="{ 'is-invalid': form.errors.has('safe_id') }"
            @selected="addSafeId"
            @clear="clearSafeId"
            initialValue="form.safe_id">
          </autocomplete>
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has('safe_id')" v-html="form.errors.get('safe_id')"/>
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
    return { title: this.$t('groups') }
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
        name: '',
        icon_id: '',
        group_id: ''
      })
    }
  },

  methods: {
    async store () {
      await this.form.post('/api/settings/groups')

      this.form.reset()
    },

    addIconId (icon) {
      this.form.icon_id = icon.value
      this.form.errors.clear('icon_id')
    },

    clearIconId () {
      this.form.icon_id = null
    },

    addSafeId (safe) {
      this.form.safe_id = safe.value
      this.form.errors.clear('safe_id')
    },

    clearSafeId () {
      this.form.safe_id = null
    }
  }
}
</script>
