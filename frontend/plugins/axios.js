export default function({ $axios, redirect }) {
  $axios.setBaseURL('http://localhost:8000/api')
  $axios.setHeader('Content-Type', 'application/json')
}
