<template>
  <b-row>
    <b-col>
      <card>
        {{ $t('you_are_logged_in') }}
      </card>
    </b-col>
    <b-col>
      <card>
        {{ $t('you_are_logged_in') }}
      </card>
    </b-col>
    <b-col>
      <card>
        {{ $t('you_are_logged_in') }}
      </card>
    </b-col>
  </b-row>
</template>

<script>
export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
