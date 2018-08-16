<template>
  <b-card :header="title ? title : ''" class="mt-2">
    <component-loading v-if="loading"></component-loading>
    <template v-else>
      <slot></slot>
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
