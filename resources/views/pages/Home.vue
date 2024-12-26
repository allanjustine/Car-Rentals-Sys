<template layout>
    <div
        class="container mx-auto p-4"
        style="
            background-image: url('/images/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        "
    >
        <div class="text-right mb-8"><h1 class="float-right bg-gray-200 px-2 rounded">Total Renters: {{ rentCounts }}</h1></div>
        <section class="hero">
            <div class="hero-content text-center px-4 py-16">
                <h1 class="text-4xl font-bold">Welcome to Car Rentals</h1>
                <p class="mt-4 mb-5 text-lg">
                    Find the perfect car for your journey
                </p>
                <Link
                    v-if="!auth.user"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
                    href="/login"
                    >Get Started</Link
                >
            </div>
        </section>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";

const props = defineProps({
    auth: Array,
    rentCounts: Number,
});

const user = usePage().props.auth;

console.log(user);
</script>
