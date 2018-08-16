<template>
  <div class="row">
    <div class="col-md-3">
      <card :title="$t('settings')" class="settings-card mb-4">
        <ul class="nav flex-column nav-pills">
          <li v-for="tab in settings" :key="tab.route" class="nav-item">
            <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
              <fa :icon="tab.icon" fixed-width/>
              {{ tab.name }}
            </router-link>
          </li>
        </ul>
      </card>

      <card :title="$t('system')" class="settings-card">
        <ul class="nav flex-column nav-pills">
          <li v-for="(tab, index) in system" :key="index" class="nav-item">
            <router-link :to="{ name: 'content.browse', params: { content: tab.content } }" class="nav-link" active-class="active">
              <fa :icon="tab.icon" fixed-width/>
              {{ tab.name }}
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
import { config } from '~/mixins/config'

export default {
  middleware: 'auth',

  mixins: [config],

  data: function () {
    return {
      domain: 'content',
    }
  },

  computed: {
    settings () {
      return [
        {
          icon: 'user',
          name: this.$t('profile'),
          route: 'settings.profile'
        },
        {
          icon: 'lock',
          name: this.$t('password'),
          route: 'settings.password'
        }
      ]
    },
    system () {
      return [
        {
          icon: 'circle',
          name: this.$t('icons'),
          content: 'icons'
        },
        {
          icon: 'tags',
          name: this.$t('tags'),
          content: 'tags'
        },
        {
          icon: 'folder',
          name: this.$t('categories'),
          content: 'categories'
        },
        {
          icon: 'allergies',
          name: this.$t('types'),
          content: 'types'
        },
        {
          icon: 'archive',
          name: this.$t('groups'),
          content: 'groups'
        },
        {
          icon: 'file-alt',
          name: this.$t('fields'),
          content: 'fields'
        }
      ]
    }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
</style>
