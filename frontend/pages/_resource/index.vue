<template>
  <tc-container>
    <template v-if="resource.total">
      <div class="w-full flex flex-wrap items-center justify-between px-4">
        <h1 class="font-semibold uppercase">
          {{ resourceName }}
        </h1>
        <p class="text-gray-500 text-sm">
          {{ resource.total }} {{ $t('resource.results') }}
        </p>
        <table class="table-auto">
          <thead>
            <tr>
              <th
                v-for="(thead, idx) in resource.data[0]"
                :key="idx"
                class="px-4 py-2"
              >
                {{ idx }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(trow, trow_idx) in resource.data" :key="trow_idx">
              <td
                v-for="(tdata, tdata_idx) in trow"
                :key="tdata_idx"
                class="border px-4 py-2"
              >
                {{ tdata }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>
    <template v-else>
      <tc-svg-empty class="h-64 mt-8" />
    </template>
  </tc-container>
</template>

<script>
export default {
  computed: {
    resourceName() {
      return this.$route.params.resource.toUpperCase()
    }
  },
  async asyncData({ $axios, params }) {
    const resource = await $axios.$get('/admin/' + params.resource)
    return { resource }
  }
}
</script>
