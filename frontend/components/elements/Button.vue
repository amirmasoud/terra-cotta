<template>
  <button
    :type="type"
    class="flex items-stretch uppercase tracking-wide text-xs font-bold appearance-none border-none rounded leading-tight"
    :class="`py-1 text-${color}-500 bg-${color}-700 text-${color}-200`"
  >
    <div
      v-if="icon"
      :class="`flex items-center bg-${color}-800 rounded shadow-lg mx-1`"
    >
      <component :is="`${icon}-svg`" :class="`text-${color}-200`"></component>
    </div>
    <div
      class="flex items-center "
      :class="`text-${color}-100 ${icon ? 'pl-1 pr-2' : 'px-2'}`"
    >
      <slot></slot>
    </div>
  </button>
</template>

<script>
import PlusSvg from '~/components/svg/Plus'

export default {
  props: {
    type: {
      type: String,
      default: 'button'
    },
    color: {
      type: String,
      default: 'green'
    },
    icon: {
      type: String,
      default: null
    }
  },

  components: { PlusSvg }
}
</script>
