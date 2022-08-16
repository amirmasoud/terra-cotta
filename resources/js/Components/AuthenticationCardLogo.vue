<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Logo from "@/Components/Logo.vue";
</script>

<template>
    <Link :href="'/'">
        <Logo class="w-32" />
    </Link>
</template>
