<template>
  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right"><slot></slot></label>
    <div class="col-md-7">
      <autocomplete
        v-if="(Boolean(form[name]) && Boolean(initialDisplay)) ||
              (!Boolean(form[name]) && !Boolean(initialDisplay))"
        :source="source + 'search?q='"
        :results-property="resultsProperty"
        :results-display="resultsDisplay"
        :input-class="inputClass"
        :name="name"
        :class="{ 'is-invalid': form.errors.has(name) }"
        @selected="addResourceId(name, $event)"
        @clear="clearResourceId(name)"
        :initial-value="form[name]"
        :initial-display="initialDisplay">
      </autocomplete>
      <component-loading v-else></component-loading>
      <div class="help-block invalid-feedback d-block"
        v-if="form.errors.has(name)"
        v-html="form.errors.get(name)"/>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios'
import Autocomplete from 'vuejs-auto-complete'

export default {
  name: 'CAutocomplete',

  components: {
    Autocomplete
  },

  props: {
    source: { type: String },
    resultsProperty: { type: String, default: 'data' },
    resultsDisplay: { Type: String, default: 'name' },
    inputClass: { type: String, default: 'form-control' },
    name: { type: String },
    form: { type: Object },
    key: { type: String },
    data: { type: Object }
  },

  data () {
    return {
      initialDisplay: null
    }
  },

  created () {
    this.fillResourceName()
  },

  methods: {
    /**
     * Add resource ID from autocomplete component.
     *
     * @param {string} name
     * @param {object} resource
     * @return {void}
     */
    addResourceId(name, resource) {
      this.form[name] = resource.value
      this.form.errors.clear(name)
      this.initialDisplay = resource.display
    },

    /**
     * Clear selected item of autocomplete component.
     *
     * @param  {string} name
     * @return {void}
     */
    clearResourceId (name) {
      this.form[name] = null
    },

    /**
     * Fill an autocomplete name and id.
     *
     * @param  {string} resourceId
     * @param  {string} initialDisplay
     * @param  {string} api
     * @return {void}
     */
    async fillResourceName () {
      if (this.form[this.name] || typeof this.form[this.name] === 'undefined') {
        console.log(this.form)
        this.initialDisplay = this.data.name
      }
    },
  }
}
</script>
