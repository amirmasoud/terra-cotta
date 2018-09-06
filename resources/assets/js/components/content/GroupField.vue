<template>
  <div>
    <div v-for="(group, index) in form[groups]">
      <div class="form-group row">
        <div class="input-group col-md-7 offset-md-3">
          <input v-model="group.name" class="form-control" type="text" :name="groups + '[' + index + '][name]'" aria-label="Text input with segmented dropdown button" :class="{ 'is-invalid': form.errors.has(groups + '.' + index + '.name') }" @focus="$event.target.select()">
          <input v-model="group.id" class="form-control" type="hidden" :name="groups + '[' + index + '][\'id\']'" aria-label="Text input with segmented dropdown button" @focus="$event.target.select()">
          <div class="input-group-append">
            <button type="button" class="btn btn-outline-danger" @click="deleteGroup(index)"><fa icon="minus-circle" fixed-width /></button>
          </div>
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has(groups + '.' + index + '.name')" v-html="form.errors.get(groups + '.' + index + '.name')"/>
        </div>
      </div>

      <div class="form-group row fields-group" v-for="(field, findex) in group[fields]" :key="findex">
        <div class="col-md-3 text-md-right mb-1">
          <input v-model="field.label" class="form-control" type="text" :name="groups + '[' + index + '][\'fields\'][' + findex + '][\'label\']'" :class="{ 'is-invalid': form.errors.has(groups + '.' + index + '.' + fields + '.' + findex + '.label') }" @focus="$event.target.select()">
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has(groups + '.' + index + '.' + fields + '.' + findex + '.label')" v-html="form.errors.get(groups + '.' + index + '.' + fields + '.' + findex + '.label')"/>
        </div>
        <div class="input-group col-md-7 mb-1">
          <div class="input-group-prepend" v-if="field.type.name == 'password'">
            <button class="btn btn-outline-secondary" type="button" @click.prevent="visibility = !visibility"><fa :icon="visibility ? 'eye' : 'eye-slash'" fixed-width /></button>
          </div>
          <component :is="field.type.name | capitalize"
            :field="field"
            :form="form"
            aria-label="Text input with segmented dropdown button"
            :name="groups + '[' + index + '][\'fields\'][' + findex + '][\'value\']'"
            :class="{ 'is-invalid': form.errors.has(groups + '.' + index + '.' + fields + '.' + findex + '.value') }"
            :visibility="visibility"
          ></component>
          <has-error :form="form" :field="groups + '[' + index + '][\'fields\'][' + findex + '][\'value\']'"/>
          <div class="input-group-append" style="max-height: 2.375rem">
            <button type="button" class="btn btn-outline-danger" @click="deleteField(findex, index)"><fa icon="minus" fixed-width /></button>
            <button type="button" class="btn btn-outline-secondary dropdown-toggle px-2" :class="{'dropdown-loading': !types}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
              <fa v-if="!types" icon="spinner" size="lg" fixed-width spin />
            </button>
            <div class="dropdown-menu" v-if="types">
              <a class="dropdown-item" href="#" v-for="type in types" @click.prevent="fieldType(index, findex, type)">{{ type.name }}</a>
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
import FText from '~/components/field/Text'
import FTextarea from '~/components/field/Textarea'
import FPassword from '~/components/field/Password'

export default {
  scrollToTop: true,

  name: 'CGroupField',

  props: {
    form: { type: Object },
    groups: { type: String, default: 'groups' },
    fields: { type: String, default: 'fields' },
  },

  components: {
    FText,
    FTextarea,
    FPassword
  },

  data () {
    return {
      types: null,
      visibility: false
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
    fieldType (groupIndex, fieldIndex, type) {
      this.form[this.groups][groupIndex].fields[fieldIndex].type.id = type.id
      this.form[this.groups][groupIndex].fields[fieldIndex].type.name = type.name
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

  filters: {
    capitalize: function (value) {
      if (!value) return 'FText'
      value = value.toString()
      return 'F' + value.charAt(0).toUpperCase() + value.slice(1)
    }
  }
}
</script>
