<template>
<li class="nav-item">

    <span class="badge badge-success mt-2" v-show="hasNotification" @click="hide">
        You have a new follower!
    </span>
</li>
</template>

<script>
    export default {
        name: "VNotification",
        data(){
            return{
                hasNotification: false,
            }

        },
        mounted(){
            const vm = this;
            let userId = window.App.userId;

            Echo.private('new-follower.' + userId)
            .listen('NewFollowerEvent', function (e) {

                vm.hasNotification = true;

                setTimeout(() => vm.hide(), 5000);

            })
        },
        methods:{
            hide(){
                this.hasNotification = false;
            }
        }
    }
</script>

<style scoped>

</style>
