<template>
  <div>
    <div v-for="(group, index) in form[groups]">
      <div class="form-group row">
        <div class="input-group col-md-7 offset-md-3">
          <input v-model="group.name" class="form-control" type="text" :name="groups + '[' + index + '][name]'" aria-label="Text input with segmented dropdown button" :class="{ 'is-invalid': form.errors.has(groups + '.' + index + '.name') }">
          <input v-model="group.id" class="form-control" type="hidden" :name="groups + '[' + index + '][\'id\']'" aria-label="Text input with segmented dropdown button">
          <div class="input-group-append">
            <button type="button" class="btn btn-outline-danger" @click="deleteGroup(index)" style="border-radius: 0 4px 4px 0;"><fa icon="minus-circle" fixed-width /></button>
          </div>
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has(groups + '.' + index + '.name')" v-html="form.errors.get(groups + '.' + index + '.name')"/>
        </div>
      </div>

      <div class="form-group row fields-group" v-for="(field, findex) in group[fields]" :key="findex">
        <div class="col-md-3 text-md-right mb-1">
          <input v-model="field.label" class="form-control" type="text" :name="groups + '[' + index + '][\'fields\'][' + findex + '][\'label\']'" :class="{ 'is-invalid': form.errors.has(groups + '.' + index + '.' + fields + '.' + findex + '.label') }">
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has(groups + '.' + index + '.' + fields + '.' + findex + '.label')" v-html="form.errors.get(groups + '.' + index + '.' + fields + '.' + findex + '.label')"/>
        </div>
        <div class="input-group col-md-7 mb-1">
          <input v-model="field.value" type="text" class="form-control" aria-label="Text input with segmented dropdown button" :name="groups + '[' + index + '][\'fields\'][' + findex + '][\'value\']'" :class="{ 'is-invalid': form.errors.has(groups + '.' + index + '.' + fields + '.' + findex + '.value') }">
          <div class="input-group-append">
            <button type="button" class="btn btn-outline-danger" @click="deleteField(findex, index)"><fa icon="minus" fixed-width /></button>
            <button type="button" class="btn btn-outline-secondary dropdown-toggle px-2" :class="{'dropdown-loading': !types}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 0 4px 4px 0;">
              <span class="sr-only">Toggle Dropdown</span>
              <fa v-if="!types" icon="spinner" size="lg" fixed-width spin />
            </button>
            <div class="dropdown-menu" v-if="types">
              <a class="dropdown-item" href="#" v-for="type in types" @click.prevent="fieldType(index, findex, type.id)">{{ type.name }}</a>
            </div>
          </div>
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has('groups.' + index + '.fields.' + findex + '.value')" v-html="form.errors.get(groups + '.' + index + '.' + fields + '.' + findex + '.value')"/>
        </div>
      </div>

      <!-- Add field -->
      <div class="form-group row">
        <div class="col-md-9 ml-auto">
          <v-button type="primary" native-type="button" @click.native="addField(index)">{{ $t('add_field') }}</v-button>
        </div>
      </div>
    </div>

    <!-- Add group -->
    <div class="form-group row">
      <div class="col-md-9 ml-auto">
        <v-button type="primary" native-type="button" @click.native="addGroup">{{ $t('add_group') }}</v-button>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios'

export default {
  scrollToTop: true,

  name: 'CGroupField',

  props: {
    form: { type: Object },
    groups: { type: String, default: 'groups' },
    fields: { type: String, default: 'fields' },
  },

  data () {
    return {
      types: null
    }
  },

  methods: {
    addField (groupIndex) {
      this.form[this.groups][groupIndex].fields.push({
        label: '',
        value: '',
        type: ''
      })
    },
    fieldType (groupIndex, fieldIndex, typeId) {
      this.form[this.groups][groupIndex].fields[fieldIndex].type = typeId
    },
    deleteField (fieldIndex, groupIndex) {
      this.form[this.groups][groupIndex].fields.splice(fieldIndex,1)
    },
    addGroup () {
      let group = { id: 0, name: '', fields: [] }
      Array.isArray(this.form[this.groups])
        ? this.form[this.groups].push(group)
        : this.form[this.groups] = [group]
    },
    deleteGroup (groupIndex) {
      this.form[this.groups].splice(groupIndex,1)
    },
    async fetchTypes() {
      const { data } = await axios.get('/api/settings/types')
      this.types = data.data
    },
  },

  created () {
    this.fetchTypes()
  },

}
</script>
