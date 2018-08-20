<template>
  <div class="row">
    <div class="col-md-3">
      <card :title="$t('categories')" class="safes-card" :loading="loadingCategories">
        <ul class="nav flex-column nav-pills" v-if="categories">
          <li class="nav-item">
            <router-link :to="{ name: 'safes.browse' }" class="nav-link" active-class="active" exact>
              <fa icon="key" fixed-width/>
              {{ $t('all') }}
            </router-link>
          </li>

          <li v-for="category in categories" :key="category.id" class="nav-item">
            <router-link :to="{ name: 'safes.browse', query: { 'category': category.id } }" class="nav-link" active-class="active" exact>
              <fa :icon="category.icon ? category.icon.class : 'circle'" fixed-width/>
              {{ category.name }}
            </router-link>
          </li>
        </ul>
      </card>
    </div>

    <div class="col-md-9">
      <transition name="fade" mode="out-in">
        <router-view :key="$route.fullPath"/>
      </transition>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  middleware: 'auth',

  data: function () {
    return {
      categories: null,
      loadingCategories: true
    }
  },

  created: function () {
    this.fetchCategories()
  },

  methods: {
    async fetchCategories () {
      const { data } = await axios.get('/api/settings/categories')
      this.categories = data.data
      this.loadingCategories = false
    }
  }
}
</script>

<style>
.safes-card .card-body {
  padding: 0;
}
</style>
