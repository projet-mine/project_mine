<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
    <head>
        <title>Acces Patenaire - MIC</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="description">
        <meta content="" name="keywords">
        <script src="https://kit.fontawesome.com/5fdfb057c8.js" crossorigin="anonymous"></script>
        @include('components.css')
    </head>
    <body>

    @include('components.nav')
    <main id="main">
        <style type="text/css">
            body{
                background: #f7f7ff;
                /* font-family: calibri !important; */
                /* font-family: Helvetica, Arial, sans-serif !important; */
            }
            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid transparent;
                border-radius: .25rem;
                margin-bottom: 1.5rem;
                box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
            }
            .me-2 {
                margin-right: .5rem!important;
            }
        </style>
        <div class="container mt-5">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body py-3">
                                <div class="flex-column align-items-center text-center">
                                    <img src="img/profile.png" width="120px" height="120px" alt="Photo de profil" class="rounded-circle p-1 bg-transparent" width="110">
                                    <div class="mt-2">
                                        <h4 class="text-capitalize">{{Auth::user()->last_name}} {{Auth::user()->first_name}}</h4>
                                        <p class="text-secondary mb-1 text-capitalize">{{Auth::user()->institut}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-5"><i class="fas fa-user-edit fs-4 pe-3"></i>Mettre à jour les informations personnelles</h5>
                                <form id="form" action="" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('put')

                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    {{-- <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="pt-1 mb-0">Photo de profil</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="file" class="form-control-file" id="profile_photo">
                                        </div>
                                    </div> --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Adresse e-mail</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" value="{{Auth::user()->email}}" class="rounded-0 form-control" name="email">
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Numéro de téléphone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="rounded-0 form-control" name="phoneNumber" value="">
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="mr-0" style="max-width: max-content; margin-left: auto;">
                                            <button type="submit" class="mt-3 mb-3 rounded-1 btn btn-success bg-base border-0 ">Enregistrer les modifications</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="pb-5" ><i class="fas fa-user-lock fs-4 pe-3"></i>Changer le mot de passe</h5>
                                    <form action="{{route('updatePassword.update' , Auth::user()->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        @if ($message = Session::get('successPassword'))
                                        <div class="alert alert-success">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        @if ($message = Session::get('FalsePassword'))
                                        <div class="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </div>
                                        @endif

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Mot de passe actuel</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="password" type="password" class="rounded-0 form-control" id="exampleInputPassword1" required>
                                            </div>
                                        </div>
                                        @if ($message = Session::get('PasswordsDifferent'))
                                        <div class="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </div>
                                        @endif
                                        @if ($message = Session::get('ShortPassword'))
                                        <div class="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </div>
                                        @endif
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nouveau mot de passe</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="NewPassword" type="password" class="rounded-0 form-control" id="exampleInputPassword1" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0 fst-normal">Confirmer le mot de passe</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input  name="ConfirmNewPassword" type="password" class="rounded-0 form-control" id="exampleInputPassword2" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <a href="" class="mt-3 text-end">Mot de passe oublié?</a>
                                        </div>
                                        <div class="mr-0" style="max-width: max-content; margin-left: auto;">
                                            <button type="submit" class="mt-3 mb-3 rounded-1 btn btn-success border-0 ">Enregistrer les modifications</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('components.js')
    </body>
</html>
