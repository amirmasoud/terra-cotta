<template>
  <div>
    <div class="bg-white p-6 rounded-lg shadow-lg">
      <div class="flex items-baseline">
        <span
          class="inline-block bg-teal-200 text-teal-800 text-xs px-2 rounded-full uppercase font-semibold tracking-wide"
          >{{ safe.category }}</span
        >
        <div
          class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide"
        >
          {{ safe.tag1 }} &bull; {{ safe.tag2 }}
        </div>
      </div>
      <h4 class="mt-1 font-semibold text-lg leading-tight truncate">
        {{ safe.title }}
      </h4>
      <div class="flex flex-wrap mt-1">
        <div
          v-for="(field, index) in safe.fields"
          :key="index"
          class="w-full mt-2"
        >
          <button class="float-left hover:bg-gray-300 rounded-full">
            <copy-svg class="p-1" /></button
          ><span class="uppercase text-xs font-semibold"
            >{{ field.label }}:
          </span>
          <span class="text-sm">{{ field.value }}</span>
          <button
            v-if="field.type == 'password'"
            class="hover:bg-gray-300 rounded-full float-left"
          >
            <eye-svg class="p-1" />
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CopySvg from "./svg/Copy";
import EyeSvg from "./svg/Eye";

export default {
  props: ["safe"],

  components: {
    "copy-svg": CopySvg,
    "eye-svg": EyeSvg,
  },
};
</script>
