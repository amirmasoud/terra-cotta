<template>
  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right"><slot></slot></label>
    <div class="col-md-7">
      <div class="custom-control custom-checkbox d-flex" v-if="permissions" v-for="permission in permissions">
        <input
          :name="name"
          :id="name + permission.id"
          type="checkbox"
          v-model="checkedPermissions"
          class="custom-control-input"
          :value="permission.name"
          @change="change">
        <label :for="name + permission.id" class="custom-control-label my-auto">
          {{ permission.name }}
        </label>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios'
export default {
  name: 'CPermission',

  props: {
    form: { type: Object },
    name: { type: String },
    checked: { type: Array },
    data: { type: Array }
  },

  data() {
    return {
      permissions: null,
      checkedPermissions: []
    }
  },

  created() {
    this.fetchRoles()
  },

  methods: {
    async fetchRoles() {
      const { data } = await axios.get('/api/settings/permissions?per_page=-1')
      this.checkedPermissions = this.data ? this.data.map(p => p.name) : []
      this.permissions = data.data
    },
    change() {
      this.form[this.name] = this.checkedPermissions
    }
  }
}
</script>
