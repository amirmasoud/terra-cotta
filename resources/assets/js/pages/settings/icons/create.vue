<template>
  <form @submit.prevent="store" @keydown="form.onKeydown($event)">
    <alert-success :form="form" :message="$t('icon_created')" class="mt-2" />
    <card :title="$t('create_icon')">
      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
          <has-error :form="form" field="name"/>
        </div>
      </div>

      <!-- Class -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('class') }}</label>
        <div class="col-md-7">
          <input v-model="form.class" :class="{ 'is-invalid': form.errors.has('class') }" class="form-control" type="text" name="class">
          <has-error :form="form" field="class"/>
        </div>
      </div>

      <!-- Markup -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('markup') }}</label>
        <div class="col-md-7">
          <textarea v-model="form.markup" :class="{ 'is-invalid': form.errors.has('markup') }" class="form-control" type="text" name="markup"></textarea>
          <has-error :form="form" field="markup"/>
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
    return { title: this.$t('icons') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      form: new Form({
        name: '',
        class: '',
        markup: '',
      })
    }
  },

  methods: {
    async store () {
      await this.form.post('/api/settings/icons')

      this.form.reset()
    },
  }
}
</script>
