<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    item: Object,
    errors: Object
})

const form = reactive({
    id: props.item.id,
    name: props.item.name,
    memo: props.item.memo,
    price: props.item.price,
    is_selling: props.item.is_selling
})

const updateItem = id => {
    router.put(route('items.update', { item: id }), form)
}
// 戻るボタンのクリックイベントハンドラを追加
const goBack = () => {
    window.history.back(); // ブラウザの履歴を1つ戻る
}
</script>

<template>
    <Head title="商品編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                商品編集
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font relative">
                            <div class="absolute top-0 left-0 mt-4 ml-4">
                                <button
                                    type="button"
                                    @click="goBack"
                                    class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                    &lt; 戻る
                                </button>
                            </div>

                            <form @submit.prevent="updateItem(form.id)">
                                <div class="container px-5 py-8 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <div class="flex flex-wrap -m-2">
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                                    <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    <div v-if="errors.name">{{ errors.name }}</div>
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                                    <textarea id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                                    <div v-if="errors.memo">{{ errors.memo }}</div>
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="price" class="leading-7 text-sm text-gray-600">商品価格</label>
                                                    <input type="number" id="price" name="price" v-model.number="form.price" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    <div v-if="errors.price">{{ errors.price }}</div>
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="is_selling" class="leading-7 text-sm text-gray-600">ステータス</label>
                                                    <input type="radio" id="is_selling" name="is_selling" v-model="form.is_selling" value="1">
                                                    <label class="ml-2 mr-4">販売中</label>
                                                    <input type="radio" id="is_selling" name="is_selling" v-model="form.is_selling" value="0">
                                                    <label class="ml-2 mr-4">停止中</label>
                                                    <div v-if="errors.is_selling">{{ errors.is_selling }}</div>
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">商品登録</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>