<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">{{twit.user_id}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{twit.updated_at}}</h6>
                        
                        <p class="card-text">{{twit.body}}</p>
                        
                        <a href="#" class="card-link">Beğen</a>
                         | 
                        <a href="#" class="card-link ml-0">Yorum Yap</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['twit'],
        mounted() {
            //console.log('Açıldı.');
        }
    }
</script>
