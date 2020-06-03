<template>
  <div class="mt-6 block">
    <span
      class="block uppercase tracking-wide text-gray-500 text-xs font-bold"
      >{{ title.toUpperCase() }}</span
    >
    <div class="mt-2">
      <div v-for="item in resource.data" :key="item.id">
        <checkbox :item="item" />
      </div>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
import Checkbox from './Checkbox'

export default {
  props: ['resource', 'title'],
  components: {
    checkbox: Checkbox
  },
  created() {
    this.$emit('data-' + this.resource, this.resourceResponse)
  }
}
</script>
