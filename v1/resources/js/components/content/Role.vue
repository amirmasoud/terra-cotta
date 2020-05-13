<template>
  <!-- Text -->
  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right"><slot></slot></label>
    <div class="col-md-7">
      <div class="custom-control custom-checkbox d-flex" v-if="roles" v-for="role in roles">
        <input
          :name="name"
          :id="name + role.id"
          type="checkbox"
          v-model="checkedRoles"
          class="custom-control-input"
          :value="role.name"
          @change="change">
        <label :for="name + role.id" class="custom-control-label my-auto">
          {{ role.name }}
        </label>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios'
export default {
  name: 'CRole',

  props: {
    form: { type: Object },
    name: { type: String },
    checked: { type: Array },
    data: { type: Array }
  },

  data() {
    return {
      roles: null,
      checkedRoles: []
    }
  },

  created() {
    this.fetchRoles()
  },

  methods: {
    async fetchRoles() {
      const { data } = await axios.get('/api/settings/roles?per_page=-1')
      this.checkedRoles = this.data ? this.data.map(r => r.name) : []
      this.roles = data.data
    },
    change() {
      this.form[this.name] = this.checkedRoles
    }
  }
}
</script>
