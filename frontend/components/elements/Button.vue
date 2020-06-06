<template>
  <button
    :type="type"
    :class="
      `flex items-stretch py-1 uppercase tracking-wide text-${color}-500 text-xs font-bold appearance-none border-none bg-${color}-700 text-${color}-200 rounded leading-tight`
    "
  >
    <div :class="`flex items-center bg-${color}-800 rounded shadow-lg mx-1`">
      <plus-svg :class="`text-${color}-200`" />
    </div>
    <div :class="`flex items-center text-${color}-100 pl-1 pr-2`">
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
    }
  },

  components: { PlusSvg }
}
</script>
