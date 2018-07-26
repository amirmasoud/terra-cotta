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
          <input v-model="form.color"
            :class="{ 'is-invalid': form.errors.has('color') }"
            class="form-control"
            type="text"
            name="color"
            @input="updateSlider">
          <has-error :form="form" field="color"/>
          <compact-picker class="mt-3 vc-compact-tags" v-model="color" @input="updateColor" :palette="palette" />
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
import { Compact } from 'vue-color'

export default {
  scrollToTop: true,

  components: {
    'compact-picker': Compact,
  },

  metaInfo () {
    return { title: this.$t('tags') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      form: new Form({
        name: '',
        color: ''
      }),
      color: { 'hex': '#FFFFFF' },
      palette: ['#333333', '#808080', '#FFFFFF', '#D33115', '#E27300',
                '#FCC400', '#B0BC00', '#68BC00', '#16A5A5', '#009CE0',
                '#7B64FF', '#FA28FF']
    }
  },

  created() {
    this.fill()
  },

  methods: {
    async fill () {
      const { data } = await axios.get('/api/settings/tags/' + this.$route.params.tags + '/edit')

      this.form.keys().forEach(key => {
        this.form[key] = data[key]
      })
      this.color = { 'hex': data.color }
    },

    async update () {
      await this.form.patch('/api/settings/tags/' + this.$route.params.tags)
    },

    updateColor () {
      this.form.color = this.color.hex
    },

    updateSlider () {
      this.color = this.form.color
    }
  }
}
</script>
<style>
.vc-compact-tags {
  width: 245px !important;
  background-color: transparent !important;
  box-shadow: none !important;
}
.vc-compact-color-item {
  border-radius: 50%;
}
</style>
