<template>
  <b-card :header="title ? title : ''" class="mt-2">
    <template v-if="loading">
      <div class="text-center p-3">
        <fa icon="spinner" size="lg" fixed-width spin />
        <p class="mb-0 mt-1" v-if="loadingMessage">{{ loadingMessage }}</p>
      </div>
    </template>
    <template v-else>
      <slot/>
      <template v-if="routerName && routerLink">
        <b-link
          :to="{ name: routerLink }"
          class="card-link">
        {{ routerName }}
        </b-link>
      </template>
    </template>
  </b-card>
</template>

<script>
export default {
  name: 'Card',

  props: {
    title: {
      type: String,
      default: null
    },

    routerName: {
      type: String,
      default: null,
    },

    routerLink: {
      type: String,
      default: '#'
    },

    loading: {
      type: Boolean,
      default: false
    },

    loadingMessage: {
      type: String,
      default: null
    }
  },
}
</script>
