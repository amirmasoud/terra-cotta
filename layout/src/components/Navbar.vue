<template>
  <header class="bg-white sm:flex sm:justify-between sm:items-center">
    <div class="w-full bg-gray-900 sm:w-64 flex items-center justify-between px-4 py-3 sm:px-4 sm:py-3">
      <div>
        <h1 class="text-2xl font-bold text-white">
          <key-svg class="inline mr-2 text-indigo-400" />
          <span class="text-indigo-400">terra</span>cotta
        </h1>
      </div>
      <div class="sm:hidden">
        <button
          @click="isOpen = !isOpen"
          type="button"
          class="block text-gray-500 hover:text-white focus:text-white focus:outline-none"
        >
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path
              v-if="isOpen"
              fill-rule="evenodd"
              d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
            />
            <path
              v-if="!isOpen"
              fill-rule="evenodd"
              d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
            />
          </svg>
        </button>
      </div>
    </div>
    <nav :class="isOpen ? 'block' : 'hidden'" class="sm:block sm:px-4 sm:py-1 w-full -ml-64 ml-64">
      <div class="ml-64 flex">
        <menu-svg class="text-gray-400 w-6 self-center" />
        <div
          class="w-full relative max-w-screen-lg uppercase tracking-wide text-gray-500 text-xs font-bold appearance-none border-none text-gray-200 mx-auto px-2"
        >
          <input
            type="search"
            class="ml-4 w-full py-2 pl-2 pr-10 bg-gray-200 text-gray-500 border border-transparent focus:bg-white focus:border-gray-300 tracking-wide text-xs font-bold rounded"
            placeholder="SEARCH"
          />
          <button class="absolute right-0 -mt-1 -mr-1 p-2">
            <search-svg class="text-gray-400" />
          </button>
        </div>
        <div class="px-2 pt-2 pb-4 sm:flex sm:p-0">
          <AccountDropdown class="hidden sm:block sm:ml-6" />
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

export default {
  components: {
    AccountDropdown,
    'key-svg': KeySvg,
    'search-svg': SearchSvg,
    'menu-svg': MenuSvg,
  },
  data() {
    return {
      isOpen: false,
    }
  },
}
</script>
