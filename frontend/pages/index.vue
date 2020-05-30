<template>
  <div>
    <tc-header />
    <tc-aside />
  </div>
</template>

<script>
// import axios from 'axios'
import TcHeader from '~/components/partials/Header'
import TcAside from '~/components/partials/Aside'

export default {
  computed: {
    availableLocales() {
      return this.$i18n.locales.filter((i) => i.code !== this.$i18n.locale)
    }
  },

  // asyncData({ params, error }) {
  //   return axios
  //     .get('menu-list')
  //     .then((res) => {
  //       console.log(res)
  //       return { resourceResponse: res.data }
  //     })
  //     .catch((e) => {
  //       console.log(e)
  //       error({ statusCode: 404, message: 'Post not found' })
  //     })
  // },

  async asyncData({ api }) {
    console.log(api)
    const ip = await api.$get('http://localhost:8000/api/menu-list')
    console.log(ip)
    return { ip }
  },

  components: {
    TcHeader,
    TcAside
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
/* Sample `apply` at-rules with Tailwind CSS
.container {
  @apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
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
