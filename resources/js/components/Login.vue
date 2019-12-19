<script>
    export default {
        name:'login',
        props:{
            reqdata:{required:false}
        },
        data:function () {
            return {
                userveri:{
                    username: '',
                    password:''
                }
            }   
        },
        methods:{
            logindirect(){
                //app.js->register fonksiyonuna emit ediliyor.
                this.$emit('logindirect',this.userveri);
            }
        }
    }
</script>

<template>
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        
                        <h4 class="card-title text-center">Giriş</h4>
                        
                        <h6 v-if="reqdata==201" class="text-danger text-center my-2">Kullanıcı adınız veya şifreniz yanlış!</h6>
                        

                        <div class="form-group row pt-2">
                            <label class="col-4 col-form-label text-right col-form-label-sm">Kullanıcı Adı</label>
                            <div class="col-8">
                                <input v-model="userveri.username" type="text" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-4 col-form-label text-right col-form-label-sm">Şifre</label>
                            <div class="col-8">
                                <input v-model="userveri.password" type="text" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="mx-3">
                            <a :href="'/register'" class="btn btn-outline-dark float-left col-5">KayıtOl</a>
                            <button v-on:click="logindirect(userveri)" class="btn btn-outline-primary float-right col-5">Giriş Yap</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
