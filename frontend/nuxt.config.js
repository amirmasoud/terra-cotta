require('dotenv').config()

export default {
  mode: 'universal',

  env: {
    appName: process.env.APP_NAME,
    baseUrl: process.env.BASE_URL,
    apiUrl: process.env.API_URL,
    appLocale: process.env.APP_LOCALE
  },

  /*
   ** Headers of the page
   */
  head: {
    title: process.env.appName,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: process.env.appName
      }
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }]
  },
  /*
   ** Customize the progress-bar color
   */
  loading: { color: '#fff' },
  /*
   ** Global CSS
   */
  css: [],
  /*
   ** Plugins to load before mounting the App
   */
  plugins: [],
  /*
   ** Nuxt.js dev-modules
   */
  buildModules: [
    // Doc: https://github.com/nuxt-community/eslint-module
    '@nuxtjs/eslint-module',
    // Doc: https://github.com/nuxt-community/stylelint-module
    '@nuxtjs/stylelint-module',
    // Doc: https://github.com/nuxt-community/nuxt-tailwindcss
    '@nuxtjs/tailwindcss',
    // Doc: https://github.com/nuxt-community/dotenv-module
    '@nuxtjs/dotenv'
  ],
  /*
   ** Nuxt.js modules
   */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    ['@nuxtjs/axios', { baseURL: process.env.apiUrl }],
    '@nuxtjs/pwa',
    [
      'nuxt-i18n',
      {
        vueI18nLoader: true,
        defaultLocale: 'en',
        locales: [
          { name: 'English', code: 'en', file: 'en.js' },
          { name: 'فارسی', code: 'fa', file: 'fa.js' }
        ],
        lazy: true,
        langDir: 'lang/',
        vuex: {
          moduleName: 'i18n',
          syncLocale: true,
          syncMessages: true,
          syncRouteParams: true
        }
      }
    ]
  ],
  /*
   ** Axios module configuration
   ** See https://axios.nuxtjs.org/options
   */
  axios: {},
  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {}
  }
}
