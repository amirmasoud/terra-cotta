<template>
  <div>
    <tc-header />
    <tc-aside :list="menuList" :tags="tags" :categories="categories" />

    <div class="overflow-scroll ml-0 md:ml-64">
      <nuxt-child />
    </div>
  </div>
</template>

<script>
import resource from '~/mixins/resource'

export default {
  mixins: [resource],

  async asyncData({ $axios }) {
    const menuList = await $axios.$get('/config/menu-list')
    const tags = await $axios.$get('/admin/tags')
    const categories = await $axios.$get('/admin/categories')
    const keys = await $axios.$get('/admin/keys')
    return { menuList, tags, categories, keys }
  },

  data: () => ({
    modalShowing: false
  }),

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
