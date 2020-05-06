<template>
  <div id="app" class="antialiased text-gray-900">
    <div class="bg-gray-200">
      <Navbar />
    </div>
    <div class="">
      <div
        class="absolute w-64 p-2 bg-gray-900 h-screen hidden overflow-scroll lg:block"
      >
        <div class="mt-2 mb-6 block">
          <div
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold appearance-none w-full border-none bg-gray-700 text-gray-200 rounded shadow"
          >
            <input
              type="search"
              class="w-full hover:shadow-inner focus:bg-gray-900 transition-all duration-300 ease-linear rounded m-1 p-2 bg-gray-800 shadow tracking-wide text-gray-500 text-xs font-bold"
              placeholder="SEARCH"
            />
            <div
              class="bg-gray-800 hover:bg-gray-900 hover:shadow-inner transition-all duration-300 ease-linear rounded mt-1 mb-1 mr-1 p-2 shadow"
            >
              <search-svg class="text-gray-300" />
            </div>
          </div>
        </div>

        <span
          class="block uppercase tracking-wide text-gray-500 text-xs font-bold"
        >
          Settings</span
        >
        <div class="mt-2 block">
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <user-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Users</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <icon-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Icons</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <tag-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Tags</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <category-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Categories</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <type-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Types</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <safe-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Safes</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <group-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Group</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <field-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Fields</div></a
          >
        </div>
        <div class="mt-6 block">
          <span
            class="block uppercase tracking-wide text-gray-500 text-xs font-bold"
          >
            Tags</span
          >
          <div class="mt-2">
            <div>
              <label class="inline-flex items-center">
                <input
                  type="checkbox"
                  class="form-checkbox bg-indigo-800 text-indigo-500"
                  checked
                />
                <span class="text-gray-200 ml-2">All</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Important</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Work</span>
              </label>
            </div>
          </div>
        </div>
        <div class="mt-6 block">
          <span
            class="block uppercase tracking-wide text-gray-500 text-xs font-bold"
            >Categories</span
          >
          <div class="">
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-indigo-800 text-indigo-500"
                  checked
                />
                <span class="text-gray-200 ml-2">All</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Servers</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Databases</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Logins</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Credit Cards</span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap mx-auto md:ml-64">
        <PropertyCard
          class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4"
          :property="property"
        />
        <PropertyCard
          class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4"
          :property="property"
        />
        <PropertyCard
          class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4"
          :property="property"
        />
        <PropertyCard
          class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4"
          :property="property"
        />
        <PropertyCard
          class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4"
          :property="property"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./components/Navbar";
import PropertyCard from "./components/PropertyCard";
import CategorySvg from "./components/svg/Category";
import FieldSvg from "./components/svg/Field";
import GroupSvg from "./components/svg/Group";
import IconSvg from "./components/svg/Icon";
import SafeSvg from "./components/svg/Safe";
import TagSvg from "./components/svg/Tag";
import TypeSvg from "./components/svg/Type";
import UserSvg from "./components/svg/User";
import SearchSvg from "./components/svg/Search";
// import Select from "./components/form/Select";
export default {
  name: "app",
  components: {
    Navbar,
    PropertyCard,
    // Select
    "category-svg": CategorySvg,
    "field-svg": FieldSvg,
    "group-svg": GroupSvg,
    "icon-svg": IconSvg,
    "safe-svg": SafeSvg,
    "tag-svg": TagSvg,
    "type-svg": TypeSvg,
    "user-svg": UserSvg,
    "search-svg": SearchSvg,
  },
  data: () => ({
    priceRangeSelect: {
      label: "Price Range",
      options: [
        { name: "Up to $500 /wk", value: 500 },
        { name: "Up to $1000 /wk", value: 1000 },
        { name: "Up to $2000 /wk", value: 2000 },
        { name: "Up to $4000 /wk", value: 4000 },
      ],
    },
    roomSelect: {
      label: "Room",
      options: [
        { name: 1, value: 1 },
        { name: 2, value: 2 },
        { name: 3, value: 3 },
        { name: 4, value: 4 },
      ],
    },
    bathroomSelect: {
      label: "Bathroom",
      options: [
        { name: 1, value: 1 },
        { name: 2, value: 2 },
        { name: 3, value: 3 },
        { name: 4, value: 4 },
      ],
    },
    property: {
      imageUrl: "img/colorado.jpg",
      imageAlt: "Colorado",
      beds: 3,
      baths: 2,
      title: "Modern home in city center",
      priceCents: "190000",
      formattedPrice: "$1,900.00",
      reviewCount: 34,
      rating: 4,
    },
  }),
};
</script>

<style src="./assets/tailwind.css"></style>
