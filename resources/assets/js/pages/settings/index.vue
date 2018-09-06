<template>
  <b-row>
    <b-col cols="12" md="9" order-sm="12">
      <transition name="fade" mode="out-in">
        <router-view :key="$route.fullPath"/>
      </transition>
    </b-col>

    <b-col cols="12" md="3" order-sm="1">
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
    </b-col>
  </b-row>
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
          icon: 'users',
          name: this.$t('users'),
          content: 'users'
        },
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
        },
        {
          icon: 'adjust',
          name: this.$t('roles'),
          content: 'roles'
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
