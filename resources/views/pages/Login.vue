<template layout="default">
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="max-w-md bg-white p-8 shadow-lg flex" style="margin-top: -150px;">
            <div class="mr-8 mt-20">
                <img src="/images/image.jpg" alt="Logo" class="w-50 h-20" />
                <p class="mt-4 text-center text-gray-600">
                    Don't have an account?
                    <Link href="/register" class="text-blue-500">Register</Link>
                </p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
                <form @submit.prevent="submit">
                    <div class="mb-4">
                        <label
                            for="username"
                            class="block text-gray-700 font-bold mb-2"
                            >Username</label
                        >
                        <input
                            v-model="form.username"
                            type="text"
                            id="username"
                            placeholder="Username"
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                        />

                        <div
                            class="text-sm text-red-500 italic"
                            v-if="form.errors.username"
                        >
                            {{ form.errors.username }}
                        </div>
                    </div>
                    <div class="mb-6">
                        <label
                            for="password"
                            class="block text-gray-700 font-bold mb-2"
                            >Password</label
                        >
                        <input
                            type="password"
                            id="password"
                            v-model="form.password"
                            placeholder="Password"
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                        />
                        <div
                            class="text-sm text-red-500 italic"
                            v-if="form.errors.password"
                        >
                            {{ form.errors.password }}
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Login
                    </button>
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
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

let form = useForm({
    username: "",
    password: "",
});

let submit = () => {
    form.post("/login");
};
</script>
