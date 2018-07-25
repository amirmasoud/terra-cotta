<template>
  <form @submit.prevent="store" @keydown="form.onKeydown($event)">
    <alert-success :form="form" :message="$t('type_created')" class="mt-2" />
    <card :title="$t('create_tag')">
      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
          <has-error :form="form" field="name"/>
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

export default {
  scrollToTop: true,

  metaInfo () {
    return { title: this.$t('types') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      form: new Form({
        name: ''
      })
    }
  },

  methods: {
    async store () {
      await this.form.post('/api/settings/types')

      this.form.reset()
    },
  }
}
</script>
