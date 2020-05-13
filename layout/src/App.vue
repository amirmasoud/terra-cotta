<template>
  <div id="app" class="antialiased text-gray-900">
    <div class="bg-gray-200">
      <Navbar menu.sync="isOpen" />
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
        <span class="block uppercase tracking-wide text-gray-500 text-xs font-bold"> Settings</span>
        <div class="mt-2 block">
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <user-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">User</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <icon-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Icon</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <tag-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Tag</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <category-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Category</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <type-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Type</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <safe-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Safe</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <group-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Group</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <field-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Field</div></a
          >
        </div>
        <div class="mt-6 block">
          <span class="block uppercase tracking-wide text-gray-500 text-xs font-bold"> Tags</span>
          <div class="mt-2">
            <div>
              <label class="inline-flex items-center">
                <input type="checkbox" class="form-checkbox bg-indigo-800 text-indigo-500" checked />
                <span class="text-gray-200 ml-2">All</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-checkbox bg-gray-700 border-none text-indigo-500" />
                <span class="text-gray-200 ml-2">Important</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-checkbox bg-gray-700 border-none text-indigo-500" />
                <span class="text-gray-200 ml-2">Work</span>
              </label>
            </div>
          </div>
        </div>
        <div class="my-6 block">
          <span class="block uppercase tracking-wide text-gray-500 text-xs font-bold">Categories</span>
          <div class="">
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-checkbox bg-indigo-800 text-indigo-500" checked />
                <span class="text-gray-200 ml-2">All</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-checkbox bg-gray-700 border-none text-indigo-500" />
                <span class="text-gray-200 ml-2">Servers</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-checkbox bg-gray-700 border-none text-indigo-500" />
                <span class="text-gray-200 ml-2">Databases</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-checkbox bg-gray-700 border-none text-indigo-500" />
                <span class="text-gray-200 ml-2">Logins</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-checkbox bg-gray-700 border-none text-indigo-500" />
                <span class="text-gray-200 ml-2">Credit Cards</span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- :class="{ 'sm:ml-64': isOpen }" -->
      <div class="overflow-scroll ml-0 md:ml-64">
        <div class="flex flex-wrap h-40 pt-13 bg-gray-300 border border-gray-400">
          <h1 class="flex w-full items-center py-2 px-2 text-xl font-semibold text-gray-600">
            <user-svg class="text-gray-600 mr-2" /> Users
          </h1>
          <div class="flex w-full flex-wrap justify-between sm:justify-start items-center px-2">
            <button
              class="flex uppercase tracking-wide text-green-500 text-xs font-bold appearance-none border-none bg-green-700 text-green-200 rounded leading-tight"
              href="#"
            >
              <div class="bg-green-800 p-1 rounded-tl rounded-bl shadow-lg ">
                <plus-svg class="text-green-200" />
              </div>
              <div class="p-2 mt-1 text-green-100">New</div>
            </button>
            <input
              type="search"
              class="bg-gray-200 p-2 rounded border border-gray-400 text-sm tracking-wide font-semibold shadow-inner sm:ml-4"
              placeholder="SEARCH USERS"
            />
          </div>
        </div>
        <div class="flex flex-wrap py-8 max-w-screen-lg mx-auto">
          <empty-svg class="h-64 mt-8" />
          <div class="w-full mt-8">
            <p class="text-center uppercase font-medium">
              Ready to put your first key in the safe?
            </p>
          </div>
          <div class="w-full px-2 sm:w-1/4 mt-4 mx-auto">
            <button
              class="flex mx-auto uppercase tracking-wide text-green-500 text-xs font-bold mb-2 appearance-none border-none bg-green-700 text-green-200 rounded leading-tight"
              href="#"
            >
              <div class="bg-green-800 p-2 rounded-tl rounded-bl shadow-lg ">
                <plus-svg class="text-green-200" />
              </div>
              <div class="p-2 mt-1 text-green-100">START HERE</div>
            </button>
          </div>
          <h1 class="w-full p-2 font-semibold uppercase">Safes</h1>
          <safe-card v-for="(safe, index) in safes" :key="index" class="w-full p-2" :safe="safe" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from './components/Navbar'
import SafeCard from './components/SafeCard'
import CategorySvg from './components/svg/Category'
import FieldSvg from './components/svg/Field'
import GroupSvg from './components/svg/Group'
import IconSvg from './components/svg/Icon'
import SafeSvg from './components/svg/Safe'
import TagSvg from './components/svg/Tag'
import TypeSvg from './components/svg/Type'
import UserSvg from './components/svg/User'
import EmptySvg from './components/svg/Empty'
import PlusSvg from './components/svg/Plus'
export default {
  name: 'app',
  components: {
    Navbar,
    'safe-card': SafeCard,
    'category-svg': CategorySvg,
    'field-svg': FieldSvg,
    'group-svg': GroupSvg,
    'icon-svg': IconSvg,
    'safe-svg': SafeSvg,
    'tag-svg': TagSvg,
    'type-svg': TypeSvg,
    'user-svg': UserSvg,
    // "search-svg": SearchSvg,
    'empty-svg': EmptySvg,
    'plus-svg': PlusSvg,
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
    isOpen: false,
    priceRangeSelect: {
      label: 'Price Range',
      options: [
        { name: 'Up to $500 /wk', value: 500 },
        { name: 'Up to $1000 /wk', value: 1000 },
        { name: 'Up to $2000 /wk', value: 2000 },
        { name: 'Up to $4000 /wk', value: 4000 },
      ],
    },
    roomSelect: {
      label: 'Room',
      options: [
        { name: 1, value: 1 },
        { name: 2, value: 2 },
        { name: 3, value: 3 },
        { name: 4, value: 4 },
      ],
    },
    bathroomSelect: {
      label: 'Bathroom',
      options: [
        { name: 1, value: 1 },
        { name: 2, value: 2 },
        { name: 3, value: 3 },
        { name: 4, value: 4 },
      ],
    },
    property: {
      imageUrl: 'img/colorado.jpg',
      imageAlt: 'Colorado',
      beds: 3,
      baths: 2,
      title: 'Modern home in city center',
      priceCents: '190000',
      formattedPrice: '$1,900.00',
      reviewCount: 34,
      rating: 3,
    },
    safes: [
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #2',
        fields: [{ label: 'password', value: '****', type: 'password' }],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
      {
        category: 'server',
        tag1: 'tag 1',
        tag2: 'tag 2',
        name: 'Server #1',
        fields: [
          { label: 'username', value: 'root', type: 'text' },
          { label: 'password', value: '****', type: 'password' },
        ],
      },
    ],
  }),
}
</script>

<style src="./assets/tailwind.css"></style>
