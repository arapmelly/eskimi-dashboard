<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            
            <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Creatives
            </h2> -->
            <a href="/campaigns/create" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white my-2 py-2 px-4 border border-blue-500 hover:border-transparent rounded ease-linear transition-all duration-150 " type="button" >
  New Campaign
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
                                Start Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                End Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Daily Budget</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total Budget</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Creatives</th>
                            <th class="relative px-6 py-3"></th>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                
                                <tr v-for="campaign in campaigns.data" :key="campaign.id">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ campaign.name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ campaign.startDate }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ campaign.endDate }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ campaign.currency }} {{ campaign.dailyBudget }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ campaign.currency }} {{ campaign.totalBudget }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        
                                        <ul>
                                            <li v-for="(creative, index) in campaign.creatives" v-bind:key="index"> <PreviewModal :image="creative" /></li>
                                        </ul>
                                       <!-- <PreviewModal :image="campaign.creatives"/> -->
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <inertia-link :href="`/campaigns/edit/${campaign.id}`">Edit</inertia-link>
                                        |
                                        <inertia-link :href="`/campaigns/delete/${campaign.id}`" class="p-1">Delete</inertia-link>
                                    </td>
                                </tr>
                                
                           
                        </tbody>
                    </table>
                    <pagination class="mt-6" :links="campaigns.links" />
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
    props: ['campaigns'],
    data() {

            return {

                fileUrl: null,

            }

        },
          methods: { }
}
</script>
