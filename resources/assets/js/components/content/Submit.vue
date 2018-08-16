<template>
  <!-- Submit Button -->
  <div class="form-group row">
    <div class="col-md-9 ml-auto">
      <v-button :loading="loading" type="primary"><slot></slot></v-button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'CSubmit',

  props: {
    loading: { type: Boolean, default: false }
  },
}
</script>
