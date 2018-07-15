<template>
  <div>
    <template v-if="! loading">
      <form @submit.prevent="update" @keydown="form.onKeydown($event)">
        <alert-success :form="form" :message="$t('category_updated')" class="mt-2" />
        <card :title="$t('update_category')">
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
                :initialValue="form.icon_id"
                :initialDisplay="iconIdInitialDisplay">
              </autocomplete>
              <div class="help-block invalid-feedback d-block" v-if="form.errors.has('icon_id')" v-html="form.errors.get('icon_id')"/>
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
    return { title: this.$t('categories') }
  },

  components: {
    Autocomplete,
  },

  data: function () {
    return {
      form: new Form({
        name: '',
        icon_id: ''
      }),
      iconIdInitialDisplay: null,
      loading: true
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
      const { data } = await axios.get('/api/settings/categories/' + this.$route.params.categories + '/edit')
      this.form.keys().forEach(key => {
        this.form[key] = data[key]
      })

      this.fillIconName()
    },

    async fillIconName () {
      if (this.form.icon_id) {
        const { data } = await axios.get('/api/settings/icons/' + this.form.icon_id)
        this.iconIdInitialDisplay = data.name
      } else {
        this.iconIdInitialDisplay = ''
        this.form.icon_id = null
      }
      this.loading = false
    },

    async update () {
      await this.form.patch('/api/settings/categories/' + this.$route.params.categories)
    },

    addIconId (icon) {
      this.form.icon_id = icon.value
      this.form.errors.clear('icon_id')
    },

    clearIconId () {
      this.form.icon_id = null
    }
  }
}
</script>
