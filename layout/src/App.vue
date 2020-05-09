<template>
  <div id="app" class="antialiased text-gray-900">
    <div class="bg-gray-200">
      <Navbar />
    </div>
    <div class="">
      <div
        class="absolute w-64 p-2 bg-gray-900 hidden overflow-scroll h-(screen-16) lg:block"
      >
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
            <div class="p-2 mt-1">User</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <icon-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Icon</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <tag-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Tag</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <category-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Category</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <type-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Type</div></a
          >
          <a
            class="flex uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 appearance-none w-full border-none bg-gray-700 text-gray-200 rounded leading-tight"
            href="#"
            ><div class="bg-gray-800 p-2 rounded-tl rounded-bl shadow-lg ">
              <safe-svg class="text-gray-600" />
            </div>
            <div class="p-2 mt-1">Safe</div></a
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
            <div class="p-2 mt-1">Field</div></a
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
      <div class="ml-64 h-(screen-16) overflow-scroll">
        <div class="flex flex-wrap py-8 max-w-screen-lg mx-auto">
          <empty-svg class="p-56 -mt-48" />
          <div class="w-full -mt-48">
            <p class="text-center uppercase font-medium">
              Ready to put your first key in the safe?
            </p>
          </div>
          <div class="w-1/4 -mt-32 mx-auto">
            <a
              class="flex uppercase tracking-wide text-green-500 text-xs font-bold mb-2 appearance-none border-none bg-green-700 text-green-200 rounded leading-tight"
              href="#"
              ><div class="bg-green-800 p-2 rounded-tl rounded-bl shadow-lg ">
                <plus-svg class="text-green-200" />
              </div>
              <div class="p-2 mt-1 text-green-100">Let's go!</div></a
            >
          </div>
          <h1 class="w-full p-2 font-semibold uppercase">Safes</h1>
          <safe-card
            v-for="(safe, index) in safes"
            :key="index"
            class="w-full p-2"
            :safe="safe"
          />
          <!-- <PropertyCard
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
        /> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./components/Navbar";
// import PropertyCard from "./components/PropertyCard";
import SafeCard from "./components/SafeCard";
import CategorySvg from "./components/svg/Category";
import FieldSvg from "./components/svg/Field";
import GroupSvg from "./components/svg/Group";
import IconSvg from "./components/svg/Icon";
import SafeSvg from "./components/svg/Safe";
import TagSvg from "./components/svg/Tag";
import TypeSvg from "./components/svg/Type";
import UserSvg from "./components/svg/User";
import EmptySvg from "./components/svg/Empty";
import PlusSvg from "./components/svg/Plus";
export default {
  name: "app",
  components: {
    Navbar,
    // PropertyCard,
    "safe-card": SafeCard,
    "category-svg": CategorySvg,
    "field-svg": FieldSvg,
    "group-svg": GroupSvg,
    "icon-svg": IconSvg,
    "safe-svg": SafeSvg,
    "tag-svg": TagSvg,
    "type-svg": TypeSvg,
    "user-svg": UserSvg,
    "empty-svg": EmptySvg,
    "plus-svg": PlusSvg,
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
      rating: 3,
    },
    safes: [
      {
        category: "server",
        tag1: "tag 1",
        tag2: "tag 2",
        name: "Server #1",
        fields: [
          { label: "username", value: "root", type: "text" },
          { label: "password", value: "****", type: "password" },
        ],
      },
      {
        category: "server",
        tag1: "tag 1",
        tag2: "tag 2",
        name: "Server #2",
        fields: [{ label: "password", value: "****", type: "password" }],
      },
      {
        category: "server",
        tag1: "tag 1",
        tag2: "tag 2",
        name: "Server #1",
        fields: [
          { label: "username", value: "root", type: "text" },
          { label: "password", value: "****", type: "password" },
        ],
      },
      {
        category: "server",
        tag1: "tag 1",
        tag2: "tag 2",
        name: "Server #1",
        fields: [
          { label: "username", value: "root", type: "text" },
          { label: "password", value: "****", type: "password" },
        ],
      },
      {
        category: "server",
        tag1: "tag 1",
        tag2: "tag 2",
        name: "Server #1",
        fields: [
          { label: "username", value: "root", type: "text" },
          { label: "password", value: "****", type: "password" },
        ],
      },
      {
        category: "server",
        tag1: "tag 1",
        tag2: "tag 2",
        name: "Server #1",
        fields: [
          { label: "username", value: "root", type: "text" },
          { label: "password", value: "****", type: "password" },
        ],
      },
    ],
  }),
};
</script>

<style src="./assets/tailwind.css"></style>
