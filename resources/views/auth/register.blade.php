<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="description" content="Responsive Admin Template">
    <meta name="author" content="RedstarHospital">
    <title>Smart University | Bootstrap Responsive Admin Template</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
        type="text/css">
    <!-- icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/iconic/css/material-design-iconic-font.min.css') }}">
    <!-- bootstrap -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/theme/light/theme_style.css') }}" rel="stylesheet" id="rt_style_components"
        type="text/css">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&family=Tajawal:wght@700&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: "Cairo", sans-Serif !important;
        }

    </style>
    <!-- favicon -->
    <link rel="shortcut icon" href="https://www.einfosoft.com/templates/admin/smart/source/assets/img/favicon.ico">
</head>

<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('assets/img/pages/signin.jpg') }}" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title text-center">تسجيل الدخول</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="parent">
                                        <div class="form-group">
                                            <div class="">
                                                <input name="nom_parent" dir="rtl" type="text" placeholder="إسم الأب"
                                                    class="form-control input-height">
                                                @error('nom_parent')
                                                <span class="invalid-feedback text-right d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="">
                                                <input name="prenom_parent" dir="rtl" type="text" placeholder="لقب الأب"
                                                    class="form-control input-height">
                                                @error('prenom_parent')
                                                <span class="invalid-feedback text-right d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="">
                                                <input name="numtel" dir="rtl" type="number" placeholder="رقم هاتف الأب"
                                                    class="form-control input-height">
                                                @error('numtel')
                                                <span class="invalid-feedback text-right d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    
                                        <div class="form-group">
                                            <div class="">
                                                <input name="password" dir="rtl" type="password" placeholder="كلمة السر"
                                                    class="form-control input-height">
                                                @error('password')
                                                <span class="invalid-feedback text-right d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="">
                                                <input name="password_confirmation" dir="rtl" type="password"
                                                    placeholder="تأكيد كلمة السر" class="form-control input-height">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="student">
                                        <div class="form-group">
                                            <div class="">
                                                <input name="nom" dir="rtl" type="text" placeholder="الإسم"
                                                    class="form-control input-height">
                                                @error('nom')
                                                <span class="invalid-feedback text-right d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="">
                                                <input name="prenom" dir="rtl" type="text" placeholder="اللقب"
                                                    class="form-control input-height">
                                                @error('prenom')
                                                <span class="invalid-feedback text-right d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group @error('niveau_id') has-error @enderror">
                                            <label class="text-right w-100" for="niveau_id">المرحلة التعليمية</label>
                                            <select class="form-select" name="niveau_id" id="niveau_id">
                                                <option selected disabled>إختيار مرحلة</option>
                                                @foreach(App\Models\Niveau::all() as $niveau)
                                                <option value="{{ $niveau->id }}" @if(old('niveau')==$niveau->id)
                                                    selected
                                                    @endif> {{ $niveau->label }}</option>
                                                @endforeach
                                            </select>
                                            @error('niveau_id')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="">
                                                <label for="date_naissance" class="text-right w-100">تاريخ
                                                    الولادة</label>
                                                <input name="date_naissance" id="date_naissance" dir="rtl" type="date"
                                                    class="form-control input-height">
                                                @error('date_naissance')
                                                <span class="invalid-feedback text-right d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="">
                                                <input name="email" dir="rtl" type="text"
                                                    placeholder="البريد الإلكتروني" class="form-control input-height">
                                                @error('email')
                                                <span class="invalid-feedback text-right d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>




                            <a class="btn btn-link" href="{{ route('login') }}" style="width: 100%;text-align: right;">
                                {{ __(' تسجيل الدخول') }}
                            </a>
                            <div class="form-group form-button d-flex justify-content-center">
                                <button class="btn btn-round btn-primary" type="submit" name="signin"
                                    id="signin">تسجيل</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- start js include path -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- end js include path -->



    <!-- Mirrored from www.einfosoft.com/templates/admin/smart/source/rtl/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Mar 2022 10:12:47 GMT -->
</body>

</html>
