<template>
  <div>
    <component v-for="(f,index) in fields"
      :key="index"
      :is="f.type | capitalize"
      :name="f.name"
      :form="form"
      :source="f.source"
      :placeholder="f.placeholder"
    >{{ $t(f.label) }}</component>

    <c-submit
      :loading="form.busy"
    >{{ submitText }}</c-submit>
  </div>
</template>
<script>
import CText from '~/components/content/Text'
import CTags from '~/components/content/Tags'
import CColor from '~/components/content/Color'
import CTextarea from '~/components/content/Textarea'
import CGroupField from '~/components/content/GroupField'
import CAutocomplete from '~/components/content/Autocomplete'

import { helper } from '~/mixins/helper'

export default {
  name: 'ContentForm',

  mixins: [helper],

  components: {
    CText,
    CTags,
    CColor,
    CTextarea,
    CGroupField,
    CAutocomplete
  },

  props: {
    form: { type: Object },
    fields: { type: Array }
  },

  computed: {
    /**
     * Set submit button text according to action.
     *
     * @return {string}
     */
    submitText () {
      return this.action() == 'edit'
        ? this.$t('update')
        : this.$t('create')
    }
  },

  filters: {
    capitalize: function (value) {
      if (!value) return ''
      value = value.toString()
      return 'C' + value.charAt(0).toUpperCase() + value.slice(1)
    }
  }
}
</script>
