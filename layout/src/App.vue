<template>
  <div id="app" class="antialiased text-gray-900">
    <div class="bg-gray-200">
      <navbar menu.sync="isOpen" />
    </div>
    <div class="">
      <button
        v-if="isOpen"
        @click="closeMenu"
        tabindex="-1"
        class="fixed inset-0 w-full bg-black opacity-50 cursor-default"
      ></button>
      <div
        class="transform fixed mt-13 md:translate-x-0 animate px-2 pt-2 bg-gray-900 overflow-scroll h-(screen-12) lg:block w-64"
        :class="[isOpen ? 'translate-x-0' : '-translate-x-64']"
        id="menu"
      >
        <menu-list title="" />
        <filter-checkbox resource="tags" title="tags" />
        <filter-checkbox resource="categories" title="categories" />
      </div>
      <!-- :class="{ 'sm:ml-64': isOpen }" -->
      <div class="overflow-scroll ml-0 md:ml-64">
        <div class="flex flex-wrap h-32 pt-13 bg-gray-300 border border-gray-400">
          <div class="flex w-full flex-wrap justify-between items-center px-2 max-w-screen-lg mx-auto">
            <button
              class="flex uppercase tracking-wide text-green-500 text-xs font-bold appearance-none border-none bg-green-700 text-green-200 rounded leading-tight"
              href="#"
            >
              <div class="bg-green-800 p-1 rounded-tl rounded-bl shadow-lg ">
                <plus-svg class="text-green-200" />
              </div>
              <div class="p-2 mt-1 text-green-100">New user</div>
            </button>
            <input
              type="search"
              class="bg-gray-200 p-2 rounded border border-gray-400 text-sm tracking-wide font-semibold shadow-inner sm:ml-4"
              placeholder="SEARCH USERS"
            />
          </div>
        </div>
        <div class="flex flex-wrap py-8 max-w-screen-lg mx-auto">
          <template v-if="keys.total">
            <div class="w-full flex flex-wrap items-center justify-between">
              <h1 class="p-2 font-semibold uppercase">Safes</h1>
              <p class="px-2 text-gray-500 text-sm">12 results</p>
            </div>
            <safe-card
              v-for="(safe, index) in keys.data"
              :key="index"
              @click.prevent="modalShowing = true"
              @open="modalShowing = true"
              class="w-full p-2"
              :safe="safe"
            />
          </template>
          <template v-else>
            <empty-svg class="h-64 mt-8" />
            <div class="w-full mt-8">
              <p class="text-center uppercase font-semibold">
                Ready to put your first key in the safe?
              </p>
            </div>
            <div class="w-full px-2 sm:w-1/4 mt-4 mx-auto">
              <button
                class="flex mx-auto uppercase tracking-wide text-green-500 text-xs font-bold mb-2 appearance-none border-none bg-green-700 text-green-200 rounded leading-tight"
              >
                <div class="bg-green-800 p-2 rounded-tl rounded-bl shadow-lg ">
                  <plus-svg class="text-green-200" />
                </div>
                <div class="p-2 mt-1 text-green-100">START HERE</div>
              </button>
            </div>
          </template>
        </div>
      </div>
    </div>
    <modal :showing="modalShowing" @close="modalShowing = false"></modal>
  </div>
</template>

<script>
import Navbar from './components/Navbar'
import SafeCard from './components/SafeCard'
import Modal from './components/Modal'
import EmptySvg from './components/svg/Empty'
import PlusSvg from './components/svg/Plus'
import axios from 'axios'
import Filter from './components/Filter'
import MenuList from './components/MenuList'

export default {
  name: 'app',
  components: {
    navbar: Navbar,
    modal: Modal,
    'safe-card': SafeCard,
    'empty-svg': EmptySvg,
    'plus-svg': PlusSvg,
    'filter-checkbox': Filter,
    'menu-list': MenuList,
  },
  mounted() {
    axios
      .get('http://localhost:8000/api/admin/keys')
      .then(response => {
        this.keys = response.data
      })
      .catch(error => {
        console.error(error)
      })
  },
  created() {
    this.$root.$on('menu-is-open', isOpen => {
      this.isOpen = isOpen
      if (isOpen) {
        document.body.style.overflow = 'hidden'
        document.querySelector('#menu').style.overflow = 'scroll'
      } else {
        document.body.style.overflow = 'auto'
      }
    })
  },
  methods: {
    closeMenu() {
      this.isOpen = false
      this.$root.$emit('close-menu')
      document.body.style.overflow = 'auto'
    },
  },
  data: () => ({
    keys: [],
    modalShowing: false,
    isOpen: false,
  }),
}
</script>

<style src="./assets/tailwind.css"></style>
