<template>
  <div>
    <span class="block uppercase tracking-wide text-gray-500 text-xs font-bold">
      {{ title }}</span
    >
    <div class="mt-2 block">
      <a
        v-for="item in resourceResponse"
        :key="item.uuid"
        class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
        href="#"
        ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
          <component :is="item.icon" class="text-gray-600"></component>
        </div>
        <div class="p-2 mt-1">{{ item.title }}</div></a
      >
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
import CategorySvg from '@/components/svg/Category'
import FieldSvg from '@/components/svg/Field'
import GroupSvg from '@/components/svg/Group'
import IconSvg from '@/components/svg/Icon'
import SafeSvg from '@/components/svg/Safe'
import TagSvg from '@/components/svg/Tag'
import TypeSvg from '@/components/svg/Type'
import UserSvg from '@/components/svg/User'
import FileSvg from '@/components/svg/File'

export default {
  props: ['title'],
  components: {
    'category-svg': CategorySvg,
    'field-svg': FieldSvg,
    'group-svg': GroupSvg,
    'icon-svg': IconSvg,
    'safe-svg': SafeSvg,
    'tag-svg': TagSvg,
    'type-svg': TypeSvg,
    'user-svg': UserSvg,
    'file-svg': FileSvg
  },
  data: () => ({
    resourceResponse: []
  })

  // asyncData() {
  //   const { data } = axios.get('menu-list')
  //   return { resourceResponse: data }
  // }

  // mounted() {
  //   axios
  //     .get('menu-list')
  //     .then((response) => {
  //       this.resourceResponse = response.data
  //     })
  //     .catch((error) => {
  //       console.error(error)
  //     })
  // }
}
</script>
