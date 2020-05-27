<template>
  <div class="relative">
    <button
      @click="isOpen = !isOpen"
      class="relative block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-300 focus:outline-none focus:border-white"
      :class="[isOpen ? 'z-10' : 'z-0']"
    >
      <img
        class="h-full w-full object-cover"
        src="https://images.unsplash.com/photo-1531295695962-cb83d1692a25?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=256&q=80"
        alt="Your avatar"
      />
    </button>
    <button
      v-if="isOpen"
      @click="isOpen = false"
      tabindex="-1"
      class="fixed inset-0 h-full w-full bg-black opacity-50 cursor-default"
    ></button>
    <div
      v-if="isOpen"
      class="absolute right-0 py-2 mt-1 w-(screen-4) sm:w-64 bg-white rounded-lg shadow-lg z-20"
    >
      <a
        href="#"
        class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"
      >
        {{ $t('account.settings') }}
      </a>
      <a
        href="#"
        class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"
        >{{ $t('account.signout') }}</a
      >
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isOpen: false
    }
  },
  created() {
    if (process.client) {
      const handleEscape = (e) => {
        if (e.key === 'Esc' || e.key === 'Escape') {
          this.isOpen = false
        }
      }
      document.addEventListener('keydown', handleEscape) // eslint-disable-line nuxt/no-globals-in-created
      this.$once('hook:beforeDestroy', () => {
        document.removeEventListener('keydown', handleEscape) // eslint-disable-line nuxt/no-globals-in-created
      })
    }
  }
}
</script>
