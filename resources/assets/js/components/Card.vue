<template>
  <b-card :header="title ? title : ''"
    class="mt-2">
    <slot/>
    <template v-if="routerName && routerLink">
      <b-link
        :to="{ name: routerLink }"
        class="card-link">
      {{ routerName }}
      </b-link>
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
    }
  },
}
</script>
