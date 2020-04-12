<template>
  <div id="app" class="antialiased text-gray-900">
    <div class="bg-gray-200">
      <Navbar/>
    </div>
    <div class="container mx-auto">
      <div class="flex flex-wrap">
        <PropertyCard class="w-full sm:w-1/2 lg:w-1/3 p-4" :property="property"/>
        <PropertyCard class="w-full sm:w-1/2 lg:w-1/3 p-4" :property="property"/>
        <PropertyCard class="w-full sm:w-1/2 lg:w-1/3 p-4" :property="property"/>
        <PropertyCard class="w-full sm:w-1/2 lg:w-1/3 p-4" :property="property"/>
        <PropertyCard class="w-full sm:w-1/2 lg:w-1/3 p-4" :property="property"/>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from './components/Navbar'
import PropertyCard from './components/PropertyCard'
export default {
  name: 'app',
  components: {
    Navbar,
    PropertyCard
  },
  data: () => ({
    property: {
      imageUrl: 'img/colorado.jpg',
      imageAlt: 'Colorado',
      beds: 3,
      baths: 2,
      title: "Modern home in city center",
      priceCents: "190000",
      formattedPrice: "$1,900.00",
      reviewCount: 34,
      rating: 4
    }
  })
}
</script>

<style src="./assets/tailwind.css"></style>
