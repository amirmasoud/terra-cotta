<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2"
      for="grid-state"
    >{{ select.label }}</label>
    <div class="relative">
      <select
        class="block appearance-none w-full bg-gray-700 text-gray-200 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:gray-900"
      >
        <option v-for="{value, name} in select.options" :key="value">{{ name }}</option>
      </select>
      <div
        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-200"
      >
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
        </svg>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["select"]
};
</script>
