export default async function ({ $axios }) {
  $axios.setBaseURL(process.env.API_URL)
  $axios.setHeader('Content-Type', 'application/json')
  await $axios.get('/sanctum/csrf-cookie', {
    withCredentials: true,
  })
}
