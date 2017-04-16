<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        @include('style_css')
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    My first application in Laravel
                </div>
                <div class="links">
                    <a href="/users">Tüm Kullanıcılar</a>
                    <a href="/images">Tüm Resimler</a>
                    <?php
                        $contact = Session::get('contact');
                        if($contact == NULL || $contact == ''){
                    ?>
                        <a href="/login">Oturum Aç</a>
                    <?php
                    }else{?>
                        <a href="/logout">Oturum Kapat</a> Hoş Geldin <b style="color:red;"><?php echo $contact;?></b>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
