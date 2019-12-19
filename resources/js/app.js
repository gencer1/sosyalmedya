/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
    data:{
        regreqstatus: 0, // register componentine veri taşıyor {200 success , 201 error}
        logreqstatus: 0, // login componentine veri taşıyor {200 success , 201 error}
        createtwitstatus:0, 
        twit_list :[]
    },
    methods:{
        register(userdata){
            axios({
                url:'/register',
                method:'post',
                data : {
                    username : userdata.username,
                    password : userdata.password,
                    email : userdata.email
                }
            }).then(function(res){
                app.regreqstatus = res.status;
            })
        },
        login(loguserdata){
            axios({
                url:'/login',
                method:'post',
                data : {
                    username : loguserdata.username,
                    password : loguserdata.password
                }
            }).then(function(res){
                app.logreqstatus = res.status;
                
                if(res.status == 200){
                    console.log(res);
                    window.location.href = '/welcome';
                }
            })
        },
        getTwitList(){
            axios({
                url:'/ListTwit',
                method:'post',
                data : {
                    id:window.Laravel.userid
                }
            })
            .then((res) => {
                this.twit_list = res.data;
            }).catch(function(){console.log('hata')});
        },
        createTwit(_body){
            axios({
                url:'/createtwit',
                method:'post',
                data : {
                    user_id:window.Laravel.userid,
                    body:_body
                }
            }).then(() => {
                this.createtwitstatus = 1;
                app.getTwitList();
            }).catch(() => this.createtwitstatus = -1);
        }   
    },
    created(){        
        if(window.Laravel !== undefined) this.getTwitList();
    }
});
