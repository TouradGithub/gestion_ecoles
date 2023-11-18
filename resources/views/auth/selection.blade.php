<!DOCTYPE html>
<html lang="fr" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Modèle HTML5" />
    <meta name="description" content="Webmin - Modèle d'administration Bootstrap 4 & Angular 5" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Gestion Scolaire</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Police -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- CSS -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
</head>

<body>

    <div class="wrapper">

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
                 style="background-image: url('{{ asset('assets/images/sativa.png')}}');">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">Sélectionnez le mode de connexion</h3>
                            <div class="form-inline">

                                <a class="btn btn-default col-lg-6" title="Enseignant" href="{{route('login.show','teacher')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/teacher.png')}}">
                                    <div>Enseignant</div>
                                </a>
                                <a class="btn btn-default col-lg-6" title="Administrateur" href="{{route('login.show','admin')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/admin.png')}}">
                                    <div>Administrateur</div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- jQuery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Plugins jQuery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- Chemin des plugins -->
    <script>
        var plugin_path = 'js/';
    </script>

    <!-- Toastr -->
    @yield('js')
    <!-- Personnalisé -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>
