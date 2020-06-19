<template>
<!--    <li class="nav-item dropdown">-->
<!--        <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown"-->
<!--           aria-haspopup="true" aria-expanded="false" v-pre @click.prevent="showNotifications()">-->
<!--            <i class="{{Auth::user()->unreadNotifications->isEmpty() ? 'far fa-bell': 'fas fa-bell'}}"></i>-->
<!--            axios get unread notifications-->
<!--            v-for notification in notifications-->
<!--            <i :class="[hasNotification ? 'far fa-bell' : 'fas fa-bell']"></i>-->
<!--        </a>-->


<!--    </li>-->

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
            let userId = window.App.userId;
            // userId props? axios get authid
            Echo.private('new-follower.' + userId)
            .listen('NewFollowerEvent', function (e) {
                console.log(e);
                alert('notified')
                // this.bellColor = 'fas fa-bell';
            })
        },
        methods:{

        }
    }
</script>

<style scoped>

</style>
