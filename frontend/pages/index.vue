<template>
  <div>
    <tc-header />
    <tc-aside :list="menuList" :tags="tags" :categories="categories" />

    <div class="overflow-scroll ml-0 md:ml-64">
      <div class="flex flex-wrap h-16 pt-13 bg-gray-300 border border-gray-400">
        <div
          class="flex items-center w-full flex-wrap justify-between items-center px-2 max-w-screen-lg mx-auto"
        >
          <button
            class="flex items-stretch py-1 uppercase tracking-wide text-green-500 text-xs font-bold appearance-none border-none bg-green-700 text-green-200 rounded leading-tight"
          >
            <div class="flex items-center bg-green-800 rounded shadow-lg mx-1">
              <plus-svg class="text-green-200" />
            </div>
            <div class="flex items-center text-green-100 pl-1 pr-2">
              New user
            </div>
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
              @click.prevent="modalShowing = true"
              @open="modalShowing = true"
            >
              <div class="bg-green-800 p-2 rounded-tl rounded-bl shadow-lg ">
                <plus-svg class="text-green-200" />
              </div>
              <div class="p-2 mt-1 text-green-100">START HERE</div>
            </button>
          </div>
        </template>
      </div>
      <modal
        :showing="modalShowing"
        @close="modalShowing = false"
        :tags="tags"
        :categories="categories"
      ></modal>
    </div>
  </div>
</template>

<script>
import TcHeader from '~/components/partials/Header'
import TcAside from '~/components/partials/Aside'
import Modal from '~/components/elements/Modal'
import PlusSvg from '~/components/svg/Plus'
import EmptySvg from '~/components/svg/Empty'

export default {
  computed: {
    availableLocales() {
      return this.$i18n.locales.filter((i) => i.code !== this.$i18n.locale)
    }
  },

  async asyncData({ $axios }) {
    const menuList = await $axios.$get('/admin/menu-list')
    const tags = await $axios.$get('/admin/tags')
    const categories = await $axios.$get('/admin/categories')
    const keys = await $axios.$get('/admin/keys')
    return { menuList, tags, categories, keys }
  },

  data: () => ({
    modalShowing: false
  }),

  components: {
    TcHeader,
    TcAside,
    PlusSvg,
    EmptySvg,
    Modal
  },

  methods: {
    setLocale() {
      console.log(this.app)
      // this.$store.state.i18n.setLocale('fa')
    }
  }
}
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: 'Quicksand', 'Source Sans Pro', -apple-system, BlinkMacSystemFont,
    'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>
