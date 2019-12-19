<?php
    // Login olmamışsa login sayfasına gönderiyorum
    if(session('oturum') == null){
        header('Location: /login?error=1');
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token()}}" />


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css" />

        <script>
            window.Laravel = <?php echo json_encode([
                'csrf_token' => csrf_token(),
                'userid' => session('id'),
            ]);
                
            ?>
        </script>

    </head>
    <body>
        <div id="app" class="pb-5">

            <navbar></navbar>

            <create-twit
                class="mt-5 mb-5"
                v-bind:createtwitstatus="createtwitstatus"
                v-on:createtwitdirect="createTwit">
            </create-twit>

            <div class="mt-2" v-for="twit in twit_list">
                <list-twit :twit="twit"></list-twit>
            </div>
            
        </div>
    </body>

    <script src="{{mix('js/app.js')}}" ></script>
</html>
