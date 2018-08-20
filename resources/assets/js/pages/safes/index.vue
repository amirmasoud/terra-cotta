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

      <card :title="$t('tags')" class="safes-card" :loading="loadingTags">
        <ul class="nav flex-column nav-pills" v-if="tags">
          <li class="nav-item">
            <router-link :to="{ name: 'safes.browse' }" class="nav-link" active-class="active" exact>
              <fa icon="circle" fixed-width/>
              {{ $t('all') }}
            </router-link>
          </li>

          <li v-for="tag in tags" :key="tag.id" class="nav-item">
            <router-link :to="{ name: 'safes.browse', query: { 'tag': tag.id } }" class="nav-link" active-class="active" exact>
              <fa icon="circle" fixed-width :style="{color: tag.color}" class="text-shadow" />
              {{ tag.name }}
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
      loadingCategories: true,
      tags: null,
      loadingTags: true
    }
  },

  created: function () {
    this.fetchCategories()
    this.fetchTags()
  },

  methods: {
    async fetchCategories () {
      const { data } = await axios.get('/api/settings/categories?per_page=-1')
      this.categories = data.data
      this.loadingCategories = false
    },

    async fetchTags () {
      const { data } = await axios.get('/api/settings/tags?per_page=-1')
      this.tags = data.data
      this.loadingTags = false
    }
  }
}
</script>

<style>
.safes-card .card-body {
  padding: 0;
}
</style>
