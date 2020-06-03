<template>
  <div class="pt-16">
    <button
      v-if="isOpen"
      tabindex="-1"
      class="fixed inset-0 w-full bg-black opacity-50 cursor-default"
      @click="closeMenu"
    ></button>
    <div
      id="menu"
      class="transform fixed mt-13 md:translate-x-0 animate px-2 pt-2 bg-gray-900 overflow-scroll h-(screen-12) lg:block w-64"
      :class="[isOpen ? 'translate-x-0' : '-translate-x-64']"
    >
      <menu-list title="" :list="list" />
      <filter-checkbox :resource="tags" title="tags" />
      <filter-checkbox :resource="categories" title="categories" />
    </div>
  </div>
</template>

<script>
import MenuList from '@/components/elements/MenuList'
import FilterCheckbox from '@/components/elements/Filter'

export default {
  props: ['list', 'tags', 'categories'],
  components: {
    FilterCheckbox,
    'menu-list': MenuList
  },
  data: () => ({
    isOpen: false
  }),
  created() {
    this.$root.$on('menu-is-open', (isOpen) => {
      this.isOpen = isOpen
      if (process.client && isOpen) {
        document.body.style.overflow = 'hidden' // eslint-disable-line nuxt/no-globals-in-created
        document.querySelector('#menu').style.overflow = 'scroll' // eslint-disable-line nuxt/no-globals-in-created
      }
      if (process.client && !isOpen) {
        document.body.style.removeProperty('overflow') // eslint-disable-line nuxt/no-globals-in-created
      }
    })
  },
  methods: {
    closeMenu() {
      this.isOpen = false
      this.$root.$emit('close-menu')
      if (process.client && !this.isOpen) {
        document.body.style.removeProperty('overflow')
      }
    }
  }
}
</script>
