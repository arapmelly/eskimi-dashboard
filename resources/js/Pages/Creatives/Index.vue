<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            
            <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Creatives
            </h2> -->
            <a href="/creatives/create" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white my-2 py-2 px-4 border border-blue-500 hover:border-transparent rounded ease-linear transition-all duration-150 " type="button" >
  New Creative
</a>

        </template>

       

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        
                          <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image</th>
                            <th class="relative px-6 py-3"></th>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                
                                <tr v-for="creative in creatives.data" :key="creative.id">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ creative.name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                       <PreviewModal :image="creative.fileUrl"/>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <inertia-link :href="`/creatives/edit/${creative.id}`">Edit</inertia-link>
                                        |
                                        <inertia-link :href="`/creatives/delete/${creative.id}`" class="p-1">Delete</inertia-link>
                                    </td>
                                </tr>
                                
                           
                        </tbody>
                    </table>
                    <pagination class="mt-6" :links="creatives.links" />
                    </div>
                </div>
            </div>
        </div>


      

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import Pagination from '@/Components/Pagination'
import PreviewModal from '@/Components/PreviewModal.vue'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        Pagination,
        PreviewModal,
    },
    props: ['creatives'],
    data() {

            return {

                fileUrl: null,

            }

        },
          methods: { }
}
</script>
