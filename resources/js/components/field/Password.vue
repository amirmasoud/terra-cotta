<template>
  <input v-model="field.value"
    :class="{ 'is-invalid': form.errors.has(name) }"
    class="form-control"
    :type="visibility ? 'text' : 'password'"
    :name="name"
    @focus="visibility ? $event.target.select() : null">
</template>
<script>
export default {
  name: 'FPassword',

  props: {
    field: { type: Object },
    form: { type: Object },
    name: { type: String },
    visibility: { type: Boolean, default: false }
  }
}
</script>
