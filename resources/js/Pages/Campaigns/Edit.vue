<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        New Campaign
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form
              class="w-full max-w-lg"
              method="post"
              @submit.prevent="submit"
              enctype="multipart/form-data"
            >

            <input type="hidden" v-model="campaignId" />
              <div class="w-full px-3 py-3">
                <label
                  class="
                    block
                    uppercase
                    tracking-wide
                    text-gray-700 text-xs
                    font-bold
                    mb-2
                  "
                  for="grid-last-name"
                >
                  Campaign Name
                </label>
                <input
                  class="
                    appearance-none
                    block
                    w-full
                    bg-gray-200
                    text-gray-700
                    border border-gray-200
                    rounded
                    py-3
                    px-4
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="campaign-name"
                  type="text"
                  v-model="name"
                />
                <div v-if="this.$page.props.errors.name" class="text-red-700">
                  {{ this.$page.props.errors.name }}
                </div>
              </div>

              <!-- start Date -->
               <div class="w-full px-3 py-3">
                <label
                  class="
                    block
                    uppercase
                    tracking-wide
                    text-gray-700 text-xs
                    font-bold
                    mb-2
                  "
                  for="grid-last-name"
                >
                  Campaign Start Date
                </label>
                <input
                  class="
                    appearance-none
                    block
                    w-full
                    bg-gray-200
                    text-gray-700
                    border border-gray-200
                    rounded
                    py-3
                    px-4
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="campaign-name"
                  type="date"
                  v-model="startDate"
                />
                <div v-if="this.$page.props.errors.startDate" class="text-red-700">
                  {{ this.$page.props.errors.startDate }}
                </div>
              </div>

              <!-- end date -->
               <div class="w-full px-3 py-3">
                <label
                  class="
                    block
                    uppercase
                    tracking-wide
                    text-gray-700 text-xs
                    font-bold
                    mb-2
                  "
                  for="grid-last-name"
                >
                  Campaign End Date
                </label>
                <input
                  class="
                    appearance-none
                    block
                    w-full
                    bg-gray-200
                    text-gray-700
                    border border-gray-200
                    rounded
                    py-3
                    px-4
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="campaign-name"
                  type="date"
                  v-model="endDate"
                />
                <div v-if="this.$page.props.errors.endDate" class="text-red-700">
                  {{ this.$page.props.errors.endDate }}
                </div>
              </div>

              <!-- daily budget -->
               <div class="w-full px-3 py-3">
                <label
                  class="
                    block
                    uppercase
                    tracking-wide
                    text-gray-700 text-xs
                    font-bold
                    mb-2
                  "
                  for="grid-last-name"
                >
                  Campaign Daily Budget
                </label>
                <input
                  class="
                    appearance-none
                    block
                    w-full
                    bg-gray-200
                    text-gray-700
                    border border-gray-200
                    rounded
                    py-3
                    px-4
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="campaign-name"
                  type="text"
                  v-model="dailyBudget"
                />
                <div v-if="this.$page.props.errors.dailyBudget" class="text-red-700">
                  {{ this.$page.props.errors.dailyBudget }}
                </div>
              </div>

              <!-- total budget -->
               <div class="w-full px-3 py-3">
                <label
                  class="
                    block
                    uppercase
                    tracking-wide
                    text-gray-700 text-xs
                    font-bold
                    mb-2
                  "
                  for="grid-last-name"
                >
                  Campaign Total Budget
                </label>
                <input
                  class="
                    appearance-none
                    block
                    w-full
                    bg-gray-200
                    text-gray-700
                    border border-gray-200
                    rounded
                    py-3
                    px-4
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="campaign-name"
                  type="text"
                  v-model="totalBudget"
                />
                <div v-if="this.$page.props.errors.totalBudget" class="text-red-700">
                  {{ this.$page.props.errors.totalBudget }}
                </div>
              </div>

              <!-- files -->


              <div class="w-full px-3 py-3">
                <button
                  type="submit"
                  class="
                    bg-transparent
                    hover:bg-blue-500
                    text-blue-700
                    font-semibold
                    hover:text-white
                    my-2
                    py-2
                    px-4
                    border border-blue-500
                    hover:border-transparent
                    rounded
                  "
                >
                  Update
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
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Link,
    reactive,
    Inertia,
  },
  props: ['campaign'],
  data() {
    return {
      name: this.campaign.name,
      startDate: this.campaign.startDate,
      endDate: this.campaign.endDate,
      dailyBudget: this.campaign.dailyBudget,
      totalBudget: this.campaign.totalBudget,
      campaignId: this.campaign.id,
    };
  },
  setup() {
    const form = useForm({
      name: null,
      startDate: null,
      endDate: null,
      dailyBudget: null,
      totalBudget: null,
      campaignId: null,
    });

    return { form };
  },
  methods: {
    submit() {
      //if (this.$refs.photo) {
        //this.form.image = this.$refs.photo.files[0];
        this.form.campaignId = this.campaignId;
        this.form.name = this.name;
        this.form.startDate = this.startDate;
        this.form.endDate = this.endDate;
        this.form.dailyBudget = this.dailyBudget;
        this.form.totalBudget = this.totalBudget;
      //}
      this.form.post(route("campaigns.update"));
    },
    previewImage(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    },
  },
};
</script>
