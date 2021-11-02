<template>


<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white my-2 py-2 px-4 border border-blue-500 hover:border-transparent rounded ease-linear transition-all duration-150" type="button"  @click="openModal()">
  preview
</button>

 <div
	class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
	id="my-modal"
></div>

    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">

                      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                        

                        <div class="fixed inset-0 transition-opacity">

                          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

                        </div>

                        <!-- This element is to trick the browser into centering the modal contents. -->

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                       
<div class="mx-3 mt-3 mb-3 my-3 ">

  <div> 
    <a href="#" @click="closeModal()" class="mb-3 mt-3 mx-3">X</a>
  </div>
<hr>
<img :src="imageUrl">

</div>

                          

                        </div>

                      </div>

                    </div>
</template>
<script>

export default {
    
    props: ['image'],
    data() {

            return {

                editMode: false,

                isOpen: false,
                imageUrl: this.image

            }

        },
          methods: {

            openModal: function () {

                this.isOpen = true;

            },

            closeModal: function () {

                this.isOpen = false;

                this.reset();

                this.editMode=false;

            }

        }
}
</script>
