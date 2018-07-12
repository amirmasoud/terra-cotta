<template>
  <form @submit.prevent="update" @keydown="form.onKeydown($event)">
    <alert-success :form="form" :message="$t('icon_updated')" class="mt-2" />
    <card :title="$t('update_icon')">
      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
          <has-error :form="form" field="name"/>
        </div>
      </div>

      <!-- Color -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('color') }}</label>
        <div class="col-md-7">
          <input v-model="form.color" :class="{ 'is-invalid': form.errors.has('color') }" class="form-control" type="text" name="color">
          <has-error :form="form" field="color"/>
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

<script>
import Form from 'vform'
import axios from 'axios'
import { mapGetters } from 'vuex'

export default {
  scrollToTop: true,

  metaInfo () {
    return { title: this.$t('tags') }
  },

  data: function () {
    return {
      form: new Form({
        name: '',
        color: ''
      }),
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
      const { data } = await axios.get('/api/settings/tags/' + this.$route.params.tags + '/edit')

      this.form.keys().forEach(key => {
        this.form[key] = data[key]
      })
    },

    async update () {
      await this.form.patch('/api/settings/tags/' + this.$route.params.tags)
    },
  }
}
</script>
