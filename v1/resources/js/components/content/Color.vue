<template>
  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right">{{ $t(name) }}</label>
    <div class="col-md-7">
      <input v-model="form[name]"
        :class="{ 'is-invalid': form.errors.has(name) }"
        class="form-control"
        type="text"
        :name="name"
        @input="updateSlider">
      <has-error :form="form" :field="name"/>
      <compact-picker class="mt-3 vc-compact-tags" v-model="form[name]" @input="updateColor" :palette="palette" />
    </div>
  </div>
</template>

<script>
import { Compact } from 'vue-color'

export default {
  name: 'CColor',

  components: {
    'compact-picker': Compact,
  },

  props: {
    form: { type: Object },
    name: { type: String }
  },

  data: function () {
    return {
      palette: ['#333333', '#808080', '#FFFFFF', '#D33115', '#E27300',
                '#FCC400', '#B0BC00', '#68BC00', '#16A5A5', '#009CE0',
                '#7B64FF', '#FA28FF']
    }
  },

  methods: {
    updateColor () {
      this.form[this.name] = this.form[this.name].hex
    },

    updateSlider () {
      this[this.name] = this.form[this.name]
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
