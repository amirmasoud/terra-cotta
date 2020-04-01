<template>
  <textarea v-model="field.value"
    :class="{ 'is-invalid': form.errors.has(name) }"
    class="form-control"
    :name="name"
  ></textarea>
</template>
<script>
export default {
  name: 'FTextarea',

  props: {
    field: { type: Object },
    form: { type: Object },
    name: { type: String },
  },

  methods: {
    changeVisibility() {
      console.log(1)
    }
  }
}
</script>
