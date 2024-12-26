<template>
    <section class="bg-violet-700">
        <div class="wrapper flex">
            <div id="brand" class="text-lg text-white font-bold py-5" style="font-family: 'Courier New', Courier, monospace;">
                CAR RENTALS
            </div>
            <nav class="main-nav py-2 ml-10">
                <Link class="main-link" href="/">Home</Link>
                <!-- <Link v-if="user" class="main-link" href="/users"
                    >Users</Link
                > -->
                <Link v-if="user" class="main-link" href="/renters"
                    >Renters</Link
                >
                <Link v-if="user" class="main-link" href="/car-details"
                    >Cars</Link
                >
            </nav>
            <div class="flex p-2 ml-auto">
                <Link
                    v-if="!user"
                    class="ml-2 py-4 text-white font-semibold bg-violet-500 hover:bg-violet-600 text-white font-bold px-4 rounded"
                    href="/login"
                    >Log In</Link
                >
                <Link
                    v-if="user"
                    class="py-4 text-white font-semibold hover:bg-violet-500 px-2"
                    href="/logout"
                    method="post"
                    as="button"
                    >Log Out</Link
                >
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

defineProps({
    user: "",
});
</script>
