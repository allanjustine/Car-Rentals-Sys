<template layout="default">
    <div class="container bg-violet-700 w-[800px] shadow p-10 mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-5 text-white text-center">
            Car Rentals Renter Updating Ticket
        </h1>
        <form @submit.prevent="update">
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="car_detail_id"
                        >Car to be rent:</label
                    >
                    <select
                        v-model="form.car_detail_id"
                        name="car_detail_id"
                        id="car_detail_id"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">Select Car Model</option>
                        <option disabled>Select Car Model</option>
                        <option
                            v-for="car in car_details"
                            :key="car.id"
                            :value="car.id"
                        >
                            {{ car.make }}, {{ car.model }}
                        </option>
                    </select>
                    <span
                        v-if="form.errors.car_detail_id"
                        class="text-red-300"
                        >{{ form.errors.car_detail_id }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="day"
                        >Rent Duration: (We limit 7 days/1 week only)</label
                    >
                    <select
                        v-model="form.day"
                        name="day"
                        id="day"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">
                            Select Rent Duration
                        </option>
                        <option disabled>Select Rent Duration</option>
                        <option value="1">1 Day</option>
                        <option value="2">2 Days</option>
                        <option value="3">3 Days</option>
                        <option value="4">4 Days</option>
                        <option value="5">5 Days</option>
                        <option value="6">6 Days</option>
                        <option value="7">7 Days/1 Week</option>
                    </select>
                    <span v-if="form.errors.day" class="text-red-300">{{
                        form.errors.day
                    }}</span>
                </div>
            </div>
            <div class="grid grid-cols-4 sm:grid-cols-4 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="name"
                        >Name:</label
                    >
                    <input
                        type="text"
                        id="name"
                        v-model="form.name"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.name" class="text-red-300">{{
                        form.errors.name
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="address"
                        >Address:</label
                    >
                    <input
                        type="text"
                        id="address"
                        v-model="form.address"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.address" class="text-red-300">{{
                        form.errors.address
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="email"
                        >Email:</label
                    >
                    <input
                        v-model="form.email"
                        type="email"
                        name="email"
                        id="email"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.email" class="text-red-300">{{
                        form.errors.email
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="phone"
                        >Phone Number:</label
                    >
                    <input
                        v-model="form.phone"
                        type="text"
                        name="phone"
                        id="phone"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.phone" class="text-red-300">{{
                        form.errors.phone
                    }}</span>
                </div>
            </div>

            <div>
                <div class="flex justify-between">
                    <button
                        type="submit"
                        class="bg-violet-500 hover:bg-violet-800 text-white font-bold py-2 px-4 rounded"
                    >
                        Save Changes
                    </button>

                    <Link
                        href="/renters"
                        class="bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 px-4 rounded"
                    >
                        Back
                    </Link>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    renter: Object,
    car_details: Object,
});

let form = useForm({
    name: props.renter.name,
    address: props.renter.address,
    email: props.renter.email,
    phone: props.renter.phone,
    day: props.renter.day,
    cost: props.renter.cost,
    car_detail_id: props.renter.car_detail_id,
});

const update = () => {
    Inertia.post(`/renters/${props.renter.id}`, {
        _method: "put",
        name: form.name,
        address: form.address,
        email: form.email,
        phone: form.phone,
        day: form.day,
        cost: form.cost,
        car_detail_id: form.car_detail_id,
    });
};
</script>
