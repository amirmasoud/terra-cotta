<template>
  <header class="bg-white sm:flex sm:justify-between sm:items-center border-b border-gray-300">
    <div class="w-full bg-gray-900 flex items-center justify-between px-4 py-3 sm:px-4 sm:py-3 sm:w-64 hidden">
      <div>
        <h1 class="text-2xl font-bold text-white">
          <key-svg class="inline mr-2 text-indigo-400" />
          <span class="text-indigo-400">terra</span>cotta
        </h1>
      </div>
    </div>
    <nav class="py-2 w-full">
      <div class="flex items-center ml-1">
        <button type="button" @click="toggle" class="text-gray-400 sm:px-2 hover:text-gray-600">
          <menu-svg v-if="!isOpen" class="w-6" />
          <close-svg v-else class="w-6 p-1 relative z-10 bg-red-700 text-white rounded-full" />
        </button>
        <div
          class="w-full relative max-w-screen-lg uppercase tracking-wide text-gray-500 text-xs font-bold appearance-none border-none text-gray-200 mx-auto pr-2"
        >
          <input
            type="search"
            class="w-full ml-1 py-2 pl-2 pr-8 bg-gray-200 text-gray-500 border border-transparent focus:bg-white focus:border-gray-300 tracking-wide text-xs font-bold rounded outline-none focus:shadow-outline"
            placeholder="SEARCH"
          />
          <button class="absolute right-0 top-0 mr-1 px-2 pb-2 pt-1 outline-none focus:shadow-outline">
            <search-svg class="text-gray-400" />
          </button>
        </div>
        <div class="mr-1">
          <AccountDropdown class="sm:px-2" />
        </div>
        <!-- <div class="px-4 py-5 border-t border-gray-800 sm:hidden">
          <div class="flex items-center">
            <img
              class="h-8 w-8 border-2 border-gray-600 rounded-full object-cover"
              src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=256&q=80"
              alt="Your avatar"
            />
            <span class="ml-3 font-semibold text-black">Jane Doe</span>
          </div>
          <div class="mt-4">
            <a href="#" class="block text-gray-900 hover:text-black">Account settings</a>
            <a href="#" class="mt-2 block text-gray-900 hover:text-black">Support</a>
            <a href="#" class="mt-2 block text-gray-900 hover:text-black">Sign out</a>
          </div>
        </div> -->
      </div>
    </nav>
  </header>
</template>

<script>
import AccountDropdown from './AccountDropdown'
import KeySvg from './svg/Key'
import SearchSvg from './svg/Search'
import MenuSvg from './svg/Menu'
import CloseSvg from './svg/Close'

export default {
  components: {
    AccountDropdown,
    'key-svg': KeySvg,
    'search-svg': SearchSvg,
    'menu-svg': MenuSvg,
    'close-svg': CloseSvg,
  },
  data() {
    return {
      isOpen: false,
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
    },
  },
}
</script>
