<template>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" v-on:submit.prevent="login_user">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" v-model="user.name" name="name" class="login__input" placeholder="User name / Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" v-model="user.password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <button type="submit" class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</template>
<script>

import Swal from 'sweetalert2'
export default {
    data(){
        return {
            user:{}
        }
    },
    methods:{
        //user login function and api call
        login_user(){
            this.axios
                .post('http://127.0.0.1:8000/api/login',this.user)
                .then((resp) =>{
                    console.log(resp["data"]["status"]);
                    //this.loadlist();
                    //reset form
                    this.user.name = '';
                    this.user.password = '';
                    if(resp["data"]["status"] === "error")
                    {
                        console.log('error')
                        Swal.fire({
                            title: 'OPPS',
                            text:   "error",
                            icon: 'warning',

                        });
                    }
                    else
                    {
                        this.$router.push({name: 'index'});
                        // console.log('success')
                        // Swal.fire({
                        //     title: 'Hurry',
                        //     text:   "You have been logged-in successfully",
                        //     icon: 'success',
                        //
                        // });
                    }

                })
                .catch((e)=>{
                    console.log(e);
                    Swal.fire({
                        title: 'Hurry',
                        text:   e,
                        icon: 'warning',

                    });
                })
        }
    }
}
</script>

<style scoped>
    @import "../../../css/login.css";
</style>
