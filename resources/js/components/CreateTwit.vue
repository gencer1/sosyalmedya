<script>
    export default {
        props:[
            'createtwitstatus'
        ],
        data:function () {
            return {
                twitBody:''
            }   
        },
        methods:{
            createtwitdirect(){
                //app.js->register fonksiyonuna emit ediliyor.
                this.$emit('createtwitdirect',this.twitBody);
                this.twitBody = '';
            }
        }
    }
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">Twit Oluştur</div>

                    <div class="card-body p-1">
                        <textarea v-model="twitBody" rows="3" style="width:100%;" placeholder="Neler oluyor?"></textarea>
                    </div>

                    <div class="card-footer">
                        
                        <span v-if="createtwitstatus==1" class="text-success w-25">Twit paylaşıldı</span>
                        <span v-else-if="createtwitstatus==-1" class="text-danger w-25">Twit paylaşılamadı</span>

                        <button v-on:click="createtwitdirect" class="btn w-25 float-right btn-block btn-info text-white">Paylaş</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>


