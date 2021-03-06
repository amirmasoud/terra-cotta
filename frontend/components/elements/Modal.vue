<template>
  <transition name="fade">
    <div
      v-if="showing"
      class="fixed inset-0 w-full h-screen max-h-screen flex items-center justify-center overflow-hidden px-2 shadow-lg bg-semi-75"
      @click.self="close"
    >
      <div
        class="relative w-full max-h-(screen-24) max-w-2xl bg-white shadow-lg rounded-lg p-2 overflow-scroll"
      >
        <button
          aria-label="close"
          class="absolute bg-white w-8 h-8 pb-1 text-self-center rounded-full top-0 right-0 text-xl text-gray-500"
          @click.prevent="close"
        >
          ×
        </button>
        <div class="flex flex-wrap mb-2">
          <div class="flex flex-wrap w-full pr-1 mb-2">
            <div class="flex flex-wrap w-full mt-4">
              <div class="w-full mb-4">
                <label class="block">
                  <span class="text-gray-700">Name</span>
                  <input
                    type="text"
                    class="form-input w-full input input-indigo"
                    placeholder="Name"
                    v-model="form.name"
                  />
                </label>
              </div>
              <div class="w-full mb-4">
                <label class="block">
                  <span class="text-gray-700">Categories</span>
                  <v-select
                    multiple
                    class="w-full"
                    :options="
                      categories.data.map((c) => ({
                        label: c.name,
                        value: c.id
                      }))
                    "
                    v-model="form.categories"
                  ></v-select>
                </label>
              </div>
              <div class="w-full mb-4">
                <label class="block">
                  <span class="text-gray-700">Tags</span>
                  <v-select
                    multiple
                    class="w-full"
                    :options="
                      tags.data.map((t) => ({ label: t.name, value: t.id }))
                    "
                    v-model="form.tags"
                  ></v-select>
                </label>
              </div>
            </div>
            <div
              v-for="(field, idx) in notDeletedFields()"
              :key="idx"
              class="flex flex-wrap w-full mt-4"
            >
              <div class="w-2/3 pr-1 mb-2">
                <input
                  class="form-input w-full input input-indigo"
                  type="text"
                  placeholder="Label"
                  v-model="field.label"
                />
              </div>
              <div class="flex flex-wrap w-1/3 px-1 mb-2">
                <select
                  class="form-select w-(full-6) block px-1 pb-1"
                  v-model="field.type"
                >
                  <option value="text">Text</option>
                  <option value="password">Password</option>
                  <option value="textarea">Textarea</option>
                </select>
                <button
                  class="self-center text-gray-600 hover:text-red-600"
                  @click.prevent="field.deleted = true"
                >
                  <tc-svg-trash class="w-6 h-6 pl-1" />
                </button>
              </div>
              <div class="w-full mb-2">
                <template v-if="field.type === 'text'">
                  <input
                    class="form-input w-full input input-indigo"
                    type="text"
                    placeholder="plain..."
                    v-model="field.value"
                  />
                </template>
                <template v-else-if="field.type === 'password'">
                  <input
                    class="form-input w-full input input-indigo"
                    type="password"
                    placeholder="password..."
                    v-model="field.value"
                  />
                </template>
                <template v-else>
                  <textarea
                    class="form-textarea w-full input input-indigo"
                    placeholder="note..."
                    v-model="field.value"
                  ></textarea>
                </template>
              </div>
            </div>
          </div>
          <div class="w-full flex flex-wrap mb-4">
            <tc-button @click.native="newField()">New field</tc-button>
          </div>
          <div class="w-full flex flex-wrap">
            <button
              type="submit"
              class="uppercase tracking-wide text-indigo-500 text-xs font-bold appearance-none border-none bg-indigo-700 rounded leading-tight"
              @click.prevent="submit()"
            >
              <div class="px-2 pt-1 pb-2 mt-1 text-indigo-100">Save</div>
            </button>
          </div>
        </div>
        <slot />
      </div>
    </div>
  </transition>
</template>

<script>
import axios from 'axios'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css'

export default {
  components: {
    vSelect
  },
  props: {
    showing: {
      required: true,
      type: Boolean
    },
    tags: {
      required: true,
      type: Object
    },
    categories: {
      required: true,
      type: Object
    }
  },
  data: () => ({
    form: {
      name: '',
      categories: [],
      tags: [],
      fields: [{ label: '', type: 'text', value: '', deleted: false }]
    }
  }),
  watch: {
    showing(value) {
      if (value) {
        return document.querySelector('body').classList.add('overflow-hidden')
      }

      document.querySelector('body').classList.remove('overflow-hidden')
    }
  },
  methods: {
    close() {
      this.$emit('close')
    },
    notDeletedFields() {
      return this.form.fields.filter(function(field) {
        return field.deleted === false
      })
    },
    newField() {
      const field = { label: '', type: 'text', value: '', deleted: false }
      this.form.fields.push(field)
    },
    submit() {
      axios
        .post('http://localhost:8000/api/admin/keys', this.form)
        .then((response) => {
          console.log(response)
        })
        .catch((error) => {
          console.error(error)
        })
    }
  }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: all 0.4s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
