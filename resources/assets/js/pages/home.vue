<template>
  <b-row>
    <b-col sm="12" md="12">
      <b-row>
        <b-col sm="12" md="6" offset-md="3">
          <b-form>
            <b-form-group id="exampleInputGroup1"
                          label-for="exampleInput1">
              <b-form-input id="exampleInput1"
                            type="email"
                            required
                            placeholder="Search for everything...">
              </b-form-input>
            </b-form-group>
          </b-form>
        </b-col>
      </b-row>
    </b-col>
    <b-col sm="6" md="3">
      <b-link :to="{ name: 'safes.browse' }">
        <card :loading="loading">
          <b-row v-if="statistics">
            <b-col cols="6" sm="4">
              <fa class="h2 text-secondary" icon="key" fixed-width />
            </b-col>
            <b-col cols="6" sm="8">
              <p><strong>{{ statistics.safes_count }}</strong> <small class="text-secondary">{{ $t('safes') }}</small></p>
            </b-col>
          </b-row>
        </card>
      </b-link>
    </b-col>
    <b-col sm="6" md="3">
      <card :loading="loading">
        <b-row v-if="statistics">
          <b-col cols="6" sm="4">
            <fa class="h2 text-secondary" icon="users" fixed-width />
          </b-col>
          <b-col cols="6" sm="8">
            <p><strong>{{ statistics.users_count }}</strong> <small class="text-secondary">{{ $t('users') }}</small></p>
          </b-col>
        </b-row>
      </card>
    </b-col>
    <b-col sm="6" md="3">
      <b-link :to="{ name: 'content.browse', params: { content: 'tags' } }">
        <card :loading="loading">
          <b-row v-if="statistics">
            <b-col cols="6" sm="4">
              <fa class="h2 text-secondary" icon="tags" fixed-width />
            </b-col>
            <b-col cols="6" sm="8">
              <p><strong>{{ statistics.tags_count }}</strong> <small class="text-secondary">{{ $t('tags') }}</small></p>
            </b-col>
          </b-row>
        </card>
      </b-link>
    </b-col>
    <b-col sm="6" md="3">
      <b-link :to="{ name: 'content.browse', params: { content: 'categories' } }">
        <card :loading="loading">
          <b-row v-if="statistics">
            <b-col cols="6" sm="4">
              <fa class="h2 text-secondary" icon="folder" fixed-width />
            </b-col>
            <b-col cols="6" sm="8">
              <p><strong>{{ statistics.categories_count }}</strong> <small class="text-secondary">{{ $t('categories') }}</small></p>
            </b-col>
          </b-row>
        </card>
      </b-link>
    </b-col>
  </b-row>
</template>

<script>
import axios from 'axios'

export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  },

  data () {
    return {
      loading: true,
      statistics: null
    }
  },

  async created () {
    const { data } = await axios.get('/api/home')
    this.statistics = data.data
    this.loading = false
  }
}
</script>
