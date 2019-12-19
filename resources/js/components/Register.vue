<script>
    export default {
        name:'register',
        props:{
            reqdata:{required:false}
        },
        data:function () {
            return {
                userveri:{
                    username: '',
                    password:'',
                    email:''
                }
            }   
        },
        methods:{
            registerdirect(){
                //app.js->register fonksiyonuna emit ediliyor.
                this.$emit('registerdirect',this.userveri);
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
                        
                        <h4 class="card-title text-center">Kayıt</h4>
                        
                        <h6 v-if="reqdata==201" class="text-danger text-center my-2">Kayıt işlemi sırasında hata oluştu!</h6>
                        <h6 v-else-if="reqdata==200" class="text-success text-center my-2">İşleminiz Başarıyla Gerçekleşti :)</h6>

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

                        <div class="form-group row">
                            <label for="tbKullaniciAdi" class="col-4 col-form-label text-right col-form-label-sm">Email Adresi</label>
                            <div class="col-8">
                                <input v-model="userveri.email" type="text" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="mx-3">
                            <a :href="'/login'" class="btn btn-outline-dark float-left col-5">Giriş Yap</a>
                            <button v-on:click="registerdirect(userveri)" class="btn btn-outline-primary float-right col-5">KayitOl</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
