<template>
  <nav v-show="tablePagination && tablePagination.last_page > 1">
    <ul :class="css.wrapperClass">
      <li :class="[css.pageClass, isOnFirstPage ? css.disabledClass : '']">
        <a @click="loadPage(1)"
          :class="[css.linkClass]">
            <i v-if="css.icons.first != ''" :class="[css.icons.first]"></i>
            <span v-else>&laquo;</span>
        </a>
      </li>
      <li :class="[css.pageClass, isOnFirstPage ? css.disabledClass : '']">
        <a @click="loadPage('prev')"
          :class="[css.linkClass]">
            <i v-if="css.icons.next != ''" :class="[css.icons.prev]"></i>
            <span v-else>&nbsp;&lsaquo;</span>
        </a>
      </li>
      <template v-if="notEnoughPages">
        <template v-for="n in totalPage">
          <li :class="[css.pageClass, isCurrentPage(n) ? css.activeClass : '']">
            <a @click="loadPage(n)"
              :class="[css.linkClass]"
              v-html="n">
            </a>
          </li>
        </template>
      </template>
      <template v-else>
        <template v-for="n in windowSize">
          <li :class="[css.pageClass, isCurrentPage(windowStart+n-1) ? css.activeClass : '']">
            <a @click="loadPage(windowStart+n-1)"
              :class="[css.linkClass]"
              v-html="windowStart+n-1">
            </a>
          </li>
        </template>
      </template>
      <li :class="[css.pageClass, isOnLastPage ? css.disabledClass : '']">
        <a @click="loadPage('next')"
          :class="[css.linkClass]">
          <i v-if="css.icons.next != ''" :class="[css.icons.next]"></i>
          <span v-else>&rsaquo;&nbsp;</span>
        </a>
      </li>
      <li :class="[css.pageClass, isOnLastPage ? css.disabledClass : '']">
        <a @click="loadPage(totalPage)"
          :class="[css.linkClass]">
          <i v-if="css.icons.last != ''" :class="[css.icons.last]"></i>
          <span v-else>&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</template>

<script>
import PaginationMixin from 'vuetable-2/src/components/VuetablePaginationMixin.vue'

export default {
  name: 'VuetablePagination',

  mixins: [PaginationMixin],
}
</script>
<style>
.page-item.active .page-link {
  color: #fff !important;
  cursor: unset;
}
</style>
