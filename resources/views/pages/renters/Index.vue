<template layout>
    <div>
        <h1 class="mb-2">Renter List</h1>
    </div>
    <div class="bg-violet-700 w-[1250px] p-5 text-white rounded mt-5">
        <Link
            href="/renters/create"
            class="btn bg-violet-500 hover:bg-violet-600 float-left block text-center mt-5 mb-4"
            >Add Renter</Link
        >
        <div class="py-4">
            <table class="table mt-3 text-center">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="renter of renters.data" :key="renter.id">
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
                        <td>
                            <span class="flex">
                                <Link
                                    :href="'/renters/view/' + renter.id"
                                    class="mr-1 btn bg-violet-300 hover:bg-violet-800"
                                >
                                    View
                                </Link>
                                <Link
                                    :href="'/renters/edit/' + renter.id"
                                    class="btn bg-sky-600 hover:bg-sky-700"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="'/renters/delete/' + renter.id"
                                    class="ml-1 btn bg-red-700 hover:bg-red-800"
                                >
                                    Delete
                                </Link>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <div>
                Showing <strong>{{ renters.data.length }}</strong> entries.
            </div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <ul class="pagination">
                    <li
                        v-for="page in renters.links"
                        :key="page.url"
                        :class="{
                            ' relative z-10 inline-flex items-center text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                                !page.active && page.label !== 'Previous',
                            ' relative z-10 inline-flex items-center text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600':
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
                                'cursor-pointer relative z-10 inline-flex items-center bg-violet-300 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600':
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
    renters: Array,
});
</script>
