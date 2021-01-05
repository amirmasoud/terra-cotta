export default {
  /*
   ** Headers of the page
   */
  head: {
    title: process.env.APP_NAME,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: process.env.APP_NAME,
      },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
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
    '@nuxt/components',
  ],

  components: [
    { path: '~/components/elements', prefix: 'tc' },
    { path: '~/components/partials', prefix: 'tc' },
    { path: '~/components/svg', prefix: 'tc-svg' },
  ],

  /*
   ** Nuxt.js modules
   */
  modules: ['@nuxtjs/apollo', '@nuxtjs/pwa', 'nuxt-i18n'],

  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {},
  },
  publicRuntimeConfig: {
    appName: process.env.APP_NAME || 'Terra-Cotta',
    baseUrl: process.env.BASE_URL || 'http://localhost:3000',
    apiUrl: process.env.API_URL || 'http://localhost:8000/api',
    gqlUrl: process.env.GQL_URL,
    appLocale: process.env.LOCALE || 'en',
    apollo: {
      clientConfigs: {
        default: {
          httpEndpoint: process.env.GQL_URL,
        },
      },
    },
  },
  privateRuntimeConfig: {},
  apollo: {
    clientConfigs: {
      default: {
        httpEndpoint: 'http://localhost:8000/graphql',
      },
    },
  },
  i18n: {
    locales: [
      { name: 'English', code: 'en', file: 'en.js' },
      { name: 'فارسی', code: 'fa', file: 'fa.js' },
    ],
    defaultLocale: 'en',
    lazy: true,
    langDir: 'lang/',
  },
  // axios: {
  //   baseURL: 'http://localhost:8000/api',
  // },
}
