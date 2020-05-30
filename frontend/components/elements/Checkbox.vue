<template>
  <label class="inline-flex items-center">
    <input
      type="checkbox"
      class="form-checkbox"
      :class="
        `bg-${item.color || 'indigo'}-300 border-${item.color ||
          'indigo'}-300 text-${item.color || 'indigo'}-500`
      "
    />
    <span class="text-gray-200 ml-2">{{ item.name }}</span>
  </label>
</template>

<script>
export default {
  props: ['item']
}
</script>
