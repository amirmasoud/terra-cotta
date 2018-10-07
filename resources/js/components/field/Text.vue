<template>
  <input v-model="field.value"
    :class="{ 'is-invalid': form.errors.has(name) }"
    class="form-control"
    type="text"
    :name="name"
    @focus="$event.target.select()">
</template>
<script>
export default {
  name: 'FText',

  props: {
    field: { type: Object },
    form: { type: Object },
    name: { type: String }
  }
}
</script>
