<template>
  <div class="text-center p-2">
    <fa icon="spinner" size="lg" fixed-width spin />
    <p class="mb-0 mt-1" v-if="$slots.default"><slot></slot></p>
  </div>
</template>
<script>
export default {
  name: 'ComponentLoading',
}
</script>
