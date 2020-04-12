<template>
  <div id="app" class="antialiased text-gray-900">
    <div class="bg-gray-200">
      <Navbar />
    </div>
    <div class="">
      <div class="filter">
        Filter
      </div>
      <div class="absolute w-64 p-3 bg-gray-800 h-screen hidden lg:block">
        <label class="block">
          <span
            class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2"
          >Requested Limit</span>
          <select
            class="form-select block appearance-none w-full border-none bg-gray-700 text-gray-200 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:gray-900"
          >
            <option>$1,000</option>
            <option>$5,000</option>
            <option>$10,000</option>
            <option>$25,000</option>
          </select>
        </label>
        <div class="mt-6 block">
          <span class="block uppercase tracking-wide text-gray-500 text-xs font-bold">Property Type</span>
          <div class="mt-2">
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-radio bg-indigo-800 text-indigo-500" checked />
                <span class="text-gray-200 ml-2">House</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-radio bg-gray-700 border-none text-indigo-500" />
                <span class="text-gray-200 ml-2">Apartment</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-radio bg-gray-700 border-none text-indigo-500" />
                <span class="text-gray-200 ml-2">Loft</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-radio bg-gray-700 border-none text-indigo-500" />
                <span class="text-gray-200 ml-2">Townhouse</span>
              </label>
            </div>
          </div>
        </div>
        <div class="mt-6 block">
          <span class="block uppercase tracking-wide text-gray-500 text-xs font-bold">Amenities</span>
          <div class="mt-2">
            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" class="form-checkbox bg-indigo-800 text-indigo-500" checked />
                <span class="text-gray-200 ml-2">Balcony</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Air Conditioning</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Pool</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Beach</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Pet friendly</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Kid friendly</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Parking</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Beach</span>
              </label>
            </div>
            <div>
              <label class="inline-flex items-center mt-2">
                <input
                  type="checkbox"
                  class="form-checkbox bg-gray-700 border-none text-indigo-500"
                />
                <span class="text-gray-200 ml-2">Beach</span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap mx-auto md:ml-64">
        <PropertyCard class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4" :property="property" />
        <PropertyCard class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4" :property="property" />
        <PropertyCard class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4" :property="property" />
        <PropertyCard class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4" :property="property" />
        <PropertyCard class="w-full h-auto sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4" :property="property" />
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./components/Navbar";
import PropertyCard from "./components/PropertyCard";
// import Select from "./components/form/Select";
export default {
  name: "app",
  components: {
    Navbar,
    PropertyCard
    // Select
  },
  data: () => ({
    priceRangeSelect: {
      label: "Price Range",
      options: [
        { name: "Up to $500 /wk", value: 500 },
        { name: "Up to $1000 /wk", value: 1000 },
        { name: "Up to $2000 /wk", value: 2000 },
        { name: "Up to $4000 /wk", value: 4000 }
      ]
    },
    roomSelect: {
      label: "Room",
      options: [
        { name: 1, value: 1 },
        { name: 2, value: 2 },
        { name: 3, value: 3 },
        { name: 4, value: 4 }
      ]
    },
    bathroomSelect: {
      label: "Bathroom",
      options: [
        { name: 1, value: 1 },
        { name: 2, value: 2 },
        { name: 3, value: 3 },
        { name: 4, value: 4 }
      ]
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
      rating: 4
    }
  })
};
</script>

<style src="./assets/tailwind.css"></style>
