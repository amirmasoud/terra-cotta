<template>
  <div class="container">
    <div>
      <account-dropdown />
      <logo />
      <h1 class="title">
        frontend
      </h1>
      <h2 class="subtitle">
        Terra cotta frontend
      </h2>
      <div class="links">
        <nuxt-link
          v-for="locale in availableLocales"
          :key="locale.code"
          :to="switchLocalePath(locale.code)"
          >{{ locale.name }}</nuxt-link
        >

        <a @click="setLocale" target="_blank" class="button--green">
          {{ $store.state.i18n }}
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import AccountDropdown from '~/components/elements/AccountDropdown'
import Logo from '~/components/Logo.vue'

export default {
  computed: {
    availableLocales() {
      return this.$i18n.locales.filter((i) => i.code !== this.$i18n.locale)
    }
  },

  components: {
    Logo,
    AccountDropdown
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
