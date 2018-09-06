<template>
  <div>
    <component v-for="(f,index) in fields"
      :key="index"
      :is="f.type | capitalize"
      :name="f.name"
      :form="form"
      :source="f.source"
      :placeholder="f.placeholder"
      :data="data ? (f.attr ? data[f.attr] : null) : null"
    >{{ $t(f.label) }}</component>

    <c-submit
      :loading="form.busy"
    >{{ submitText }}</c-submit>
  </div>
</template>
<script>
import CText from '~/components/content/Text'
import CTags from '~/components/content/Tags'
import CRole from '~/components/content/Role'
import CColor from '~/components/content/Color'
import CPassword from '~/components/content/Password'
import CTextarea from '~/components/content/Textarea'
import CGroupField from '~/components/content/GroupField'
import CPermission from '~/components/content/Permission'
import CAutocomplete from '~/components/content/Autocomplete'

import { helper } from '~/mixins/helper'

export default {
  name: 'ContentForm',

  mixins: [helper],

  components: {
    CText,
    CTags,
    CRole,
    CColor,
    CPassword,
    CTextarea,
    CGroupField,
    CPermission,
    CAutocomplete
  },

  props: {
    form: { type: Object },
    fields: { type: Array },
    data: { type: Object }
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
