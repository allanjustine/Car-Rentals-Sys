<template layout>
    <div>
        <h1 class="mb-3">Car Detail List</h1>
    </div>
    <div class="bg-violet-700 w-[1250px] p-5 text-white rounded mt-5">
        <br />
        <Link
            href="/car-details/create"
            class="btn bg-violet-500 text-center hover:bg-violet-600 mt-5 mb-4"
            >Add Car</Link
        >
        <div class="py-4">
            <table class="table mt-5 text-center">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Color</th>
                        <th>Mileage</th>
                        <th>Availability</th>
                        <th>Rental Rate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="car in car_details.data" :key="car.id">
                        <td>{{ car.id }}</td>
                        <td>{{ car.make }}</td>
                        <td>{{ car.model }}</td>
                        <td>{{ car.year }}</td>
                        <td>{{ car.color }}</td>
                        <td>{{ car.mileage }}</td>
                        <td>{{ car.availability }}</td>
                        <td>
                            &#8369;{{
                                car.rental_rate.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                        <td>
                            <Link
                                :href="'/car-details/edit/' + car.id"
                                class="btn bg-sky-600 hover:bg-sky-700"
                            >
                                Edit
                            </Link>
                            <Link
                                :href="'/car-details/delete/' + car.id"
                                class="ml-1 btn bg-red-700 hover:bg-red-800"
                            >
                                Delete
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <div>
                Showing <strong>{{ car_details.data.length }}</strong> entries.
            </div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <ul class="pagination">
                    <li
                        v-for="page in car_details.links"
                        :key="page.url"
                        :class="{
                            ' relative z-10 inline-flex items-center text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                                !page.active && page.label !== 'Previous',
                            ' relative z-10 inline-flex items-center text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600':
                                page.active,
                            'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-300':
                                !page.url && page.label === 'Previous',
                        }"
                    >
                        <Link
                            v-if="page.url"
                            :href="page.url"
                            :class="{
                                'cursor-pointer relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                                    !page.active && page.label !== 'Previous',
                                'cursor-pointer relative z-10 inline-flex items-center bg-violet-300 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600':
                                    page.active,
                                'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-300':
                                    !page.url && page.label === 'Previous',
                            }"
                        >
                            <span v-if="page.label.includes('Next')"
                                >Next <i class="fas fa-chevron-right"></i
                            ></span>

                            <span v-else-if="page.label.includes('Previous')">
                                <i class="fas fa-chevron-left"></i> Previous
                            </span>
                            <span v-else class="page-link">{{
                                page.label
                            }}</span>
                        </Link>
                        <span
                            v-else-if="page.label.includes('Previous')"
                            class="cursor-not-allowed px-4 py-2"
                            ><i class="fas fa-chevron-left"></i> Previous</span
                        >
                        <span v-else class="cursor-not-allowed px-4 py-2"
                            >Next <i class="fas fa-chevron-right"></i
                        ></span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    car_details: Array,
});
</script>
