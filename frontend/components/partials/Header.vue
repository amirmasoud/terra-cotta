<template>
  <header
    class="flex items-center fixed w-full h-16 bg-white sm:flex sm:justify-between sm:items-center border-b border-gray-300"
  >
    <div class="hidden md:block md:w-64 md:px-2 md:py-2 w-full bg-gray-900">
      <div>
        <h1 class="text-2xl font-bold text-white">
          <key-svg class="inline mr-2 text-indigo-400" />
          <span class="text-indigo-400">terra</span>cotta
        </h1>
      </div>
    </div>
    <nav class="w-full md:-ml-64">
      <div class="flex items-center ml-2 md:ml-64">
        <button
          type="button"
          @click="toggle"
          class="block md:hidden text-gray-400 sm:px-2 hover:text-gray-600"
        >
          <menu-svg v-if="!isOpen" class="w-6" />
          <close-svg
            v-else
            class="w-6 p-1 relative z-10 bg-red-700 text-white rounded-full"
          />
        </button>
        <div
          class="w-full mr-2 relative max-w-screen-lg uppercase tracking-wide text-gray-500 text-xs font-bold appearance-none border-none text-gray-200 mx-auto md:pr-3"
        >
          <input
            type="search"
            class="w-full ml-2 md:ml-8 py-2 pl-2 pr-8 bg-gray-200 text-gray-500 border border-transparent focus:bg-white focus:border-gray-300 tracking-wide text-xs font-bold rounded outline-none focus:shadow-outline"
            placeholder="SEARCH"
          />
          <button
            class="flex items-center h-full absolute right-0 top-0 px-2 -mr-2 outline-none focus:shadow-outline"
          >
            <search-svg class="text-gray-400" />
          </button>
        </div>
        <div class="mx-2">
          <AccountDropdown class="sm:px-2" />
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import AccountDropdown from '~/components/elements/AccountDropdown'
import KeySvg from '~/components/svg/Key'
import SearchSvg from '~/components/svg/Search'
import MenuSvg from '~/components/svg/Menu'
import CloseSvg from '~/components/svg/Close'

export default {
  components: {
    AccountDropdown,
    'key-svg': KeySvg,
    'search-svg': SearchSvg,
    'menu-svg': MenuSvg,
    'close-svg': CloseSvg
  },
  data() {
    return {
      isOpen: false
    }
  },
  created() {
    this.$root.$on('close-menu', () => {
      this.isOpen = false
    })
  },
  methods: {
    toggle() {
      this.isOpen = !this.isOpen
      this.$root.$emit('menu-is-open', this.isOpen)
    }
  }
}
</script>
