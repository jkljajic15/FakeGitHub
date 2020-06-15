<template>
    <div>
        <input type="file" @change="onFileSelected" ref="fileInput">
        <div class="row justify-content-center mb-2">
            <button type="button"
                    class="btn btn-outline-dark"
                    @click="$refs.fileInput.click()">
                Change Photo
            </button>
        </div>
        <div class="row">
            <p class="text-danger ">
                {{errorMessage}}
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VButton",
        data(){
            return {
                selectedFile: null,
                errorMessage: '',
            }
        },
        methods: {
            onFileSelected(e){
                const vm = this;
                this.selectedFile = e.target.files[0];

                const fd = new FormData();
                fd.append('image',this.selectedFile);


                axios.post('/profile', fd)
                .then(response =>{
                    window.location.replace('/profile')
                })
                .catch(error =>{
                     vm.errorMessage = error.response.data.message;
                });

            }
        }
    }
</script>

<style scoped>
    input{
        display: none
    }
</style>
