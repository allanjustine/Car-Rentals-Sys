<template layout="default">
    <div
        class="container bg-violet-400 w-[300px] text-center shadow p-10 mx-auto mt-5"
    >
        <h2 class="text-2md font-bold mb-5 text-white text-center">
            Delete {{ renter.name }}, Rented: {{ renter.car_detail.make }}, {{ renter.car_detail.model }}
        </h2>
        <hr />
        <br /><span class="text-white">Are you sure you want to delete?</span>
        <br />
        <div class="flex justify-between">
            <button
                @click="deleteRenter"
                class="mt-10 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
            >
                Yes, delete
            </button>
            <Link
                href="/renters"
                class="mt-10 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
            >
                Cancel
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    renter: Object,
});

const deleteRenter = () => {
    Inertia.post(`/renters/${props.renter.id}`, {
        _method: "delete",
    });
};
</script>
