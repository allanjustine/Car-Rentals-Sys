<template layout="default">
    <div class="py-4" style="margin-top: -35px;">
        <div class="flex justify-center items-center h-screen">
            <div class="bg-white shadow-lg rounded p-8 max-w-lg w-full flex">
                <div class="mr-8 mt-48">
                    <img src="images/image.jpg" alt="Logo" class="w-50 h-20" />
                    <p class="mt-4 text-center text-gray-600">
                        Already have an account?
                        <Link href="login" class="text-blue-500">Go to login</Link>
                    </p>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mb-6 text-center">
                        Registration
                    </h2>
                    <form @submit.prevent="submit">
                        <div class="mb-4 flex flex-col">
                            <label
                                for="username"
                                class="block text-gray-700 text-sm font-bold mb-2"
                                >User Name:</label
                            >
                            <input
                                v-model="form.username"
                                type="text"
                                placeholder="Username"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                            />
                            <div
                                class="text-sm text-red-500 italic"
                                v-if="form.errors.username"
                            >
                                {{ form.errors.username }}
                            </div>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <label
                                for="fullname"
                                class="block text-gray-700 text-sm font-bold mb-2"
                                >Full Name:</label
                            >
                            <input
                                v-model="form.fullname"
                                type="text"
                                placeholder="Full Name"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                            />
                            <div
                                class="text-sm text-red-500 italic"
                                v-if="form.errors.fullname"
                            >
                                {{ form.errors.fullname }}
                            </div>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <label
                                for="password"
                                class="block text-gray-700 text-sm font-bold mb-2"
                                >Password:</label
                            >
                            <input
                                v-model="form.password"
                                type="password"
                                placeholder="Password"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                            />
                            <div
                                class="text-sm text-red-500 italic"
                                v-if="form.errors.password"
                            >
                                {{ form.errors.password }}
                            </div>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <label
                                for="mobile_number"
                                class="block text-gray-700 text-sm font-bold mb-2"
                                >Mobile Number:</label
                            >
                            <input
                                v-model="form.mobile_number"
                                type="text"
                                placeholder="Mobile Number"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                            />
                            <div
                                class="text-sm text-red-500 italic"
                                v-if="form.errors.mobile_number"
                            >
                                {{ form.errors.mobile_number }}
                            </div>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <label
                                for="role"
                                class="block text-gray-700 text-sm font-bold mb-2"
                                >Role:</label
                            >
                            <select
                                name="role"
                                id="role"
                                v-model="form.role"
                                class="border py-2 px-3"
                            >
                                <option value="">Select an option</option>
                                <option value="Manager">Manager</option>
                            </select>
                            <div
                                class="text-sm text-red-500 italic"
                                v-if="form.errors.role"
                            >
                                {{ form.errors.role }}
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Register
                            </button>
                        </div>
                        <div
                            class="text-sm text-red-500 italic"
                            v-if="form.errors.authentication"
                        >
                            {{ form.errors.authentication }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

let form = useForm({
    username: "",
    password: "",
    fullname: "",
    role: "",
    mobile_number: "",
});

const submit = () => {
    form.post("/register");
};
</script>
