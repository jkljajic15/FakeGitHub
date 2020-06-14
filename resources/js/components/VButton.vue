<template>
    <div>
        <input type="file" @change="onFileSelected" ref="fileInput">
<!--        <p class="text-danger"></p>-->
        <button type="button" class="btn btn-outline-dark" @click="$refs.fileInput.click()">Change Photo</button>
    </div>
</template>

<script>
    export default {
        name: "VButton",
        data(){
            return {
                selectedFile: null
            }
        },
        methods: {
            onFileSelected(e){
                this.selectedFile = e.target.files[0];

                const fd = new FormData();
                fd.append('image',this.selectedFile);

                axios.post('/profile', fd)
                .then(response =>{
                    // console.log(response.errors);
                    window.location.replace('/profile')
                })
                // .catch(function(error){
                //     console.log(error.message)
                // })



            }
        }
    }
</script>

<style scoped>
    input{
        display: none
    }
</style>
