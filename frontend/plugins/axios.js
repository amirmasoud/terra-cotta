export default function({ $axios, redirect }, inject) {
  const api = $axios.create()

  api.setBaseURL(process.env.API_URL)

  inject('api', api)
}
