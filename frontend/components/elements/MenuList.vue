<template>
  <div>
    <span class="block uppercase tracking-wide text-gray-500 text-xs font-bold">
      {{ title }}</span
    >
    <div class="mt-2 block">
      <nuxt-link
        v-for="item in list"
        :key="item.uuid"
        :to="
          localePath({ name: 'resource', params: { resource: item.resource } })
        "
        class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
        ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
          <component :is="item.icon" class="text-gray-600"></component>
        </div>
        <div class="p-2 mt-1">{{ item.title }}</div>
      </nuxt-link>
    </div>
  </div>
</template>

<script>
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
  props: ['title', 'list'],
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
  }
}
</script>
