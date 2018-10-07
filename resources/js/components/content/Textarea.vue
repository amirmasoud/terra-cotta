<template>
  <!-- Textarea -->
  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right"><slot></slot></label>
    <div class="col-md-7">
      <textarea v-model="form[name]" :class="{ 'is-invalid': form.errors.has(name) }" class="form-control" type="text" :name="name"></textarea>
      <has-error :form="form" :field="name"/>
    </div>
  </div>
</template>
<script>
export default {
  name: 'CTextarea',

  props: {
    form: { type: Object },
    name: { type: String }
  }
}
</script>
