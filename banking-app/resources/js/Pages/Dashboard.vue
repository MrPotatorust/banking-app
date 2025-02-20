<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps(["transactions"]);

const transactionAmount = ref("");
const transactionReceiverIban = ref("");

function makeTransaction() {
    router.post(route("transactions.store"));
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>

        <div>
            <div>
                <form @submit.prevent="makeTransaction">
                    <input
                        v-model="transactionAmount"
                        type="number"
                        placeholder="199.99"
                        required
                    />
                    <input
                        v-model="transactionReceiverIban"
                        type="text"
                        placeholder="SK898989435435453"
                        required
                    />
                    <button>Send</button>
                </form>
            </div>
            <div>
                <h2>transactions</h2>
                <ul>
                    <li v-for="transaction in transactions">
                        <p>Amount: {{ transaction.amount }}$</p>
                        <p>Sender: {{ transaction.sender.name }}</p>
                        <p>Receiver: {{ transaction.receiver.name }}</p>
                        -----------------------------------------
                    </li>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
