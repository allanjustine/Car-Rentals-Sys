<template layout="default">
    <div class="container bg-violet-700 w-[1000px] shadow p-10 mx-auto m-10">
        <Link
            class="flex justify-center bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 mb-5 px-4 rounded"
            href="/renters"
        >
            Back
        </Link>
        <h1 class="text-2xl font-bold text-white mb-5 text-center">
            Viewing Renter: {{ renter.name }} Details
        </h1>
        <hr />
        <div v-if="renter" class="text-white mt-2">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date Acquired</th>
                        <th>Rent Duration</th>
                        <th>Car Acquired</th>
                        <th>Car Color</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="renter">
                        <td>{{ renter.id }}</td>
                        <td>{{ renter.name }}</td>
                        <td>{{ renter.address }}</td>
                        <td>{{ renter.email }}</td>
                        <td>{{ renter.phone }}</td>
                        <td>
                            {{
                                new Date(renter.created_at).toLocaleDateString(
                                    "en-US"
                                )
                            }}
                        </td>
                        <td>{{ renter.day }} day(s)</td>
                        <td>
                            {{ renter.car_detail.make }},
                            {{ renter.car_detail.model }}
                        </td>
                        <td>{{ renter.car_detail.color }}</td>
                        <td>
                            &#8369;{{
                                renter.cost.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    renter: Array,
    car_detail: Array,
});
</script>
