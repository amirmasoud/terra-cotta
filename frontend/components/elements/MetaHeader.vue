<template>
  <div class="flex flex-wrap h-16 pt-13 bg-gray-300 border border-gray-400">
    <div
      class="flex items-center w-full flex-wrap justify-between items-center px-2 max-w-screen-lg mx-auto"
    >
      <tc-button icon="plus">{{ $t('resource.new') }}</tc-button>
      <input
        type="search"
        class="bg-gray-200 p-2 rounded border border-gray-400 text-sm tracking-wide font-semibold shadow-inner sm:ml-4"
        :placeholder="`${$t('resource.search')} ${resourceName}`"
      />
    </div>
  </div>
</template>

<script>
import resource from '~/mixins/resource'
export default {
  mixins: [resource]
}
</script>
