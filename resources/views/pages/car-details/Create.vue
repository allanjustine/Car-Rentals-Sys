<template layout="default">
    <div class="container bg-violet-700 w-[800px] shadow p-10 mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-5 text-white text-center">
            Apply Cars
        </h1>
        <form @submit.prevent="add">
            <div class="grid grid-cols-4 sm:grid-cols-4 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="make"
                        >Make:</label
                    >
                    <input
                        type="text"
                        id="make"
                        v-model="form.make"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.make" class="text-red-300">{{
                        form.errors.make
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="model"
                        >Model:</label
                    >
                    <input
                        v-model="form.model"
                        type="text"
                        name="model"
                        id="model"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.model" class="text-red-300">{{
                        form.errors.model
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="year"
                        >Year:</label
                    >
                    <input
                        v-model="form.year"
                        type="number"
                        id="year"
                        name="year"
                        min="1800"
                        max="{{ date('Y') }}"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.year" class="text-red-300">{{
                        form.errors.year
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="color"
                        >Color:</label
                    >
                    <input
                        v-model="form.color"
                        type="text"
                        id="color"
                        name="color"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.color" class="text-red-300">{{
                        form.errors.color
                    }}</span>
                </div>
            </div>
            <div class="grid grid-cols-3 sm:grid-cols-3 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="mileage"
                        >Mileage:</label
                    >
                    <input
                        v-model="form.mileage"
                        type="text"
                        id="mileage"
                        name="mileage"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.mileage" class="text-red-300">{{
                        form.errors.mileage
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="availability"
                        >Availability:</label
                    >
                    <select
                        v-model="form.availability"
                        name="availability"
                        id="availability"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">
                            Select Availability
                        </option>
                        <option disabled>Select Availability</option>
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                    </select>
                    <span
                        v-if="form.errors.availability"
                        class="text-red-300"
                        >{{ form.errors.availability }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="rental_rate"
                        >Rental Rate:</label
                    >
                    <input
                        v-model="form.rental_rate"
                        type="number"
                        id="rental_rate"
                        name="rental_rate"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.rental_rate" class="text-red-300">{{
                        form.errors.rental_rate
                    }}</span>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-violet-500 hover:bg-violet-600 text-white font-bold py-2 px-4 rounded"
                >
                    Save
                </button>
                <Link
                    href="/book-lists"
                    class="bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 px-4 rounded"
                >
                    Back
                </Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

let form = useForm({
    make: "",
    model: "",
    year: "",
    color: "",
    mileage: "",
    availability: "",
    rental_rate: "",
});

const add = () => {
    form.post("/car-details");
};
</script>
