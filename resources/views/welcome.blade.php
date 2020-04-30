<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
       -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="metro4:init" content="false">

        <meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Web Application Manifest -->
        <link rel="manifest" href="/manifest.json">

        <link rel="apple-touch-icon" sizes="180x180" href="/images/fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/fav/favicon-16x16.png">
<link rel="manifest" href="/images/fav/site.webmanifest">

        <title>Challenge</title>

        
    <!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">   

<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css">

<!--vuetify material icons-->
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

<!--nprogress-css-->
<link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />


<link href="/css/wicked.min.css" rel="stylesheet" />

<link href="/css/custom.css" rel="stylesheet" />
<link href="/css/home.css" rel="stylesheet" />


        <style>
          
        </style>
    </head>
    <body>
        <div id='app' v-cloak>

            <router-view></router-view>
        
                    </div>

                    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
         <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

         <script>
    $(document).ready(function(){
                $(window).scrollTop(0);
            });



            // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js', {
            scope: '.' 
        }).then(function (registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed 
            console.log('ServiceWorker registration failed: ', err);
        });
    }
    
             </script>

<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "f1db3d38-3d87-42a6-b202-26e9492455bd",
    });
  });
</script>

              <script src="{{asset('/js/home.js')}}"></script>

        <script src="{{asset('/js/app.js')}}"></script>

       </body>
</html>
