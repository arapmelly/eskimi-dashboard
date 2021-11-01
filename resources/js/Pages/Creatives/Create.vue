<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               New Creative
            </h2>
            

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        
                       
                       <form class="w-full max-w-lg" method="post"  @submit.prevent="submit" enctype="multipart/form-data">
                          
                            <div class="w-full px-3 py-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Creative Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="campaign-name" type="text" v-model="name" >
                                   
                            </div>

                            <div class="w-full px-3 py-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Creative File
                                </label>
                               <input
                                    type="file"
                                    @change="previewImage"
                                    ref="photo"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <img
                                    v-if="url"
                                    :src="url"
                                    class="w-full mt-4 h-80"
                                />
                                <!-- <div
                                    v-if="errors.image"
                                    class="font-bold text-red-600"
                                >
                                    {{ errors.image }}
                                </div> -->
                                   
                            </div>

                                                       

                            <div class="w-full px-3 py-3">
                                <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white my-2 py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  Create
</button>
                            </div>

                    </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        reactive,
        Inertia,
    },
    props: [],
    data() {
        return {
            url: null,
            name: null,
        };
    },
    setup() {
        const form = useForm({
            image: null,
            name: null,
        });

        return { form };
    },
    methods: {
        submit() {
            if (this.$refs.photo) {
                this.form.image = this.$refs.photo.files[0];
                this.form.name = this.name
            }
            const resp = this.form.post(route("creatives.store"));

            console.log(resp);
        },
        previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
    },
}
</script>
