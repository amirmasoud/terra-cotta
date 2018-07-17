<template>
  <div>
    <template v-if="! loadingIcon && ! loadingType && ! loadingGroup">
      <form @submit.prevent="update" @keydown="form.onKeydown($event)">
        <alert-success :form="form" :message="$t('group_updated')" class="mt-2" />
        <card :title="$t('update_group')">
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
                :initialValue="form.icon_id"
                :initialDisplay="iconIdInitialDisplay">
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
                :initialValue="form.type_id"
                :initialDisplay="typeIdInitialDisplay">
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
                :initialValue="form.group_id"
                :initialDisplay="groupIdInitialDisplay">
              </autocomplete>
              <div class="help-block invalid-feedback d-block" v-if="form.errors.has('group_id')" v-html="form.errors.get('group_id')"/>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="form-group row">
            <div class="col-md-9 ml-auto">
              <v-button :loading="form.busy" type="success">{{ $t('update') }}</v-button>
            </div>
          </div>
        </card>
      </form>
    </template>
    <template v-else>
      <card>
        <p class="text-center mb-0">
          <fa icon="spinner" size="lg" fixed-width spin />
        </p>
      </card>
    </template>
  </div>
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

  data: function () {
    return {
      form: new Form({
        label: '',
        value: '',
        icon_id: '',
        type_id: '',
        group_id: ''
      }),
      iconIdInitialDisplay: null,
      groupIdInitialDisplay: null,
      typeIdInitialDisplay: null,
      loadingIcon: true,
      loadingType: true,
      loadingGroup: true
    }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  created() {
    this.fill()
  },

  methods: {
    async fill () {
      const { data } = await axios.get('/api/settings/fields/' + this.$route.params.fields + '/edit')
      this.form.keys().forEach(key => {
        this.form[key] = data[key]
      })

      this.fillIconName()
      this.fillTypeName()
      this.fillGroupName()
    },

    async fillIconName () {
      this.loadingIcon = true
      if (this.form.icon_id) {
        const { data } = await axios.get('/api/settings/icons/' + this.form.icon_id)
        this.iconIdInitialDisplay = data.name
      } else {
        this.iconIdInitialDisplay = ''
        this.form.icon_id = null
      }
      this.loadingIcon = false
    },

    async fillTypeName () {
      this.loadingType = true
      if (this.form.type_id) {
        const { data } = await axios.get('/api/settings/types/' + this.form.type_id)
        this.typeIdInitialDisplay = data.name
      } else {
        this.typeIdInitialDisplay = ''
        this.form.type_id = null
      }
      this.loadingType = false
    },

    async fillGroupName () {
      this.loadingGroup = true
      if (this.form.group_id) {
        const { data } = await axios.get('/api/settings/groups/' + this.form.group_id)
        this.groupIdInitialDisplay = data.name
      } else {
        this.groupIdInitialDisplay = ''
        this.form.group_id = null
      }
      this.loadingGroup = false
    },

    async update () {
      await this.form.patch('/api/settings/fields/' + this.$route.params.fields)
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
