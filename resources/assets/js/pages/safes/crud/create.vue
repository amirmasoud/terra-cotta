<template>
  <form @submit.prevent="store" @keydown="form.onKeydown($event)">
    <alert-success :form="form" :message="$t('safe_created')" class="mt-2" />
    <card :title="$t('create_safe')">
      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
          <has-error :form="form" field="name"/>
        </div>
      </div>

      <!-- Categories -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('categories') }}</label>
        <div class="col-md-7">
          <vue-tags-input
            v-model="category"
            :tags="categories"
            :autocomplete-items="categoriesAutocompleteItems"
            :add-only-from-autocomplete="true"
            :placeholder="$t('add_category')"
            @tags-changed="updateCategories"
            :class="{ 'is-invalid': form.errors.has('categories') }"
            name="categories"
          />
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has('categories')" v-html="form.errors.get('categories')"/>
        </div>
      </div>

      <!-- Tags -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('tags') }}</label>
        <div class="col-md-7">
          <vue-tags-input
            v-model="tag"
            :tags="tags"
            :autocomplete-items="tagsAutocompleteItems"
            :add-only-from-autocomplete="true"
            :placeholder="$t('add_tag')"
            @tags-changed="updateTags"
            :class="{ 'is-invalid': form.errors.has('tags') }"
            name="tags"
          />
          <div class="help-block invalid-feedback d-block" v-if="form.errors.has('tags')" v-html="form.errors.get('tags')"/>
        </div>
      </div>

      <div v-for="(group, index) in form.groups">
        <div class="form-group row">
          <div class="input-group col-md-7 offset-md-3">
            <input v-model="group.name" class="form-control" type="text" name="groups[index]['name']" aria-label="Text input with segmented dropdown button">
            <input v-model="group.id" class="form-control" type="hidden" name="groups[index]['id']" aria-label="Text input with segmented dropdown button">
            <div class="input-group-append">
              <button type="button" class="btn btn-outline-danger" @click="deleteGroup(index)"><fa icon="minus-circle" fixed-width /></button>
            </div>
          </div>
        </div>

        <div class="form-group row fields-group" v-for="(field, findex) in group.fields" :key="findex">
          <div class="col-md-3 text-md-right mb-1">
            <input v-model="field.label" class="form-control" type="text" name="groups[index]['fields'][findex]['label']">
          </div>
          <div class="input-group col-md-7 mb-1">
            <input v-model="field.value" type="text" class="form-control" aria-label="Text input with segmented dropdown button" name="groups[index]['fields'][findex]['value']">
            <div class="input-group-append">
              <button type="button" class="btn btn-outline-danger" @click="deleteField(findex, index)"><fa icon="minus" fixed-width /></button>
              <button type="button" class="btn btn-outline-secondary dropdown-toggle px-2" :class="{'dropdown-loading': !types}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
                <fa v-if="!types" icon="spinner" size="lg" fixed-width spin />
              </button>
              <div class="dropdown-menu" v-if="types">
                <a class="dropdown-item" href="#" v-for="type in types" @click.prevent="fieldType(index, findex, type.id)">{{ type.name }}</a>
              </div>
            </div>
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


      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-auto">
          <v-button :loading="form.busy" type="success">{{ $t('create') }}</v-button>
        </div>
      </div>
    </card>

  </form>
</template>

<script>
import Form from 'vform'
import axios from 'axios'
import { mapGetters } from 'vuex'
import VueTagsInput from '@johmun/vue-tags-input'

export default {
  scrollToTop: true,

  components: {
    VueTagsInput,
  },

  metaInfo () {
    return { title: this.$t('safes') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  data: function () {
    return {
      form: new Form({
        name: '',
        categories: '',
        tags: '',
        groups: []
      }),
      category: '',
      categories: [],
      categoriesAutocompleteItems: [],
      tag: '',
      tags: [],
      tagsAutocompleteItems: [],
      debounce: null,
      types: null
    }
  },

  created: function () {
    this.fetchTypes()
  },

  methods: {
    async store () {
      console.log(this.form)
      await this.form.post('/api/safes')

      // this.form.reset()
      // this.tags = []
      // this.categories = []
    },
    updateCategories (newCategories) {
      this.categoriesAutocompleteItems = []
      this.categories = newCategories
      this.form.categories = newCategories.map(c => {
        return c.id
      })
    },
    categoriesInitItems () {
      if (this.category.length === 0) return
      const url = `/api/settings/categories/search?q=${this.category}`

      clearTimeout(this.debounce)
      this.debounce = setTimeout(() => {
        axios.get(url).then(response => {
          this.categoriesAutocompleteItems = response.data.data.map(c => {
            return { text: c.name, id: c.id }
          })
        }).catch(() => console.warn('Oh. Something went wrong'))
      }, 300)
    },
    updateTags (newTags) {
      this.tagsAutocompleteItems = []
      this.tags = newTags
      this.form.tags = newTags.map(t => {
        return t.id
      })
    },
    TagsInitItems () {
      if (this.tag.length === 0) return
      const url = `/api/settings/tags/search?q=${this.tag}`

      clearTimeout(this.debounce)
      this.debounce = setTimeout(() => {
        axios.get(url).then(response => {
          this.tagsAutocompleteItems = response.data.data.map(t => {
            return { text: t.name, id: t.id }
          })
        }).catch(() => console.warn('Oh. Something went wrong'))
      }, 300)
    },
    addField (groupIndex) {
      this.form.groups[groupIndex].fields.push({
        label: '',
        value: '',
        type: ''
      })
    },
    fieldType (groupIndex, fieldIndex, typeId) {
      this.form.groups[groupIndex].fields[fieldIndex].type = typeId
      console.log(this.form)
    },
    deleteField (fieldIndex, groupIndex) {
      this.form.groups[groupIndex].fields.splice(fieldIndex,1)
    },
    addGroup () {
      this.form.groups.push({
        id: 0,
        name: '',
        fields: []
      })
    },
    deleteGroup (groupIndex) {
      this.form.groups.splice(groupIndex,1)
    },
    async fetchTypes() {
      const { data } = await axios.get('/api/settings/types')
      this.types = data.data
    }
  },
  watch: {
    'category': 'categoriesInitItems',
    'tag': 'TagsInitItems',
  },
}
</script>
<style>
.fields-group .dropdown-loading::after {
  display: none;
}
.fields-group .dropdown-toggle::after {
  margin-left: 0;
}
</style>
