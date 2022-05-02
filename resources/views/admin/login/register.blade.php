<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Ever Tech</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('public/frontend/vendors/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('public/frontend/vendors/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('public/frontend/vendors/images/favicon-16x16.png') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/frontend/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/frontend/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/vendors/styles/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/frontend/src/plugins/jquery-steps/jquery.steps.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');

        document.addEventListener('readystatechange', event => {
            if (event.target.readyState === "complete") {
                @if (Session()->has('regis'))
                    var btn = document.getElementById('success-modal-btn');
                    btn.click();
                @endif
            }
        });
    </script>
</head>

<body>
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="public/frontend/vendors/images/deskapp-logo.svg" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="{{ URL::to('/login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="public/frontend/vendors/images/register-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <!-- <div class="wizard-content"> -->
                        <!-- <form class="tab-wizard2 wizard-circle wizard"> -->
                        <div class="login-title">
                            <h2 class="text-center text-primary">Register To DeskApp</h2>
                        </div>
                        <form class="sign-up-form form" action="{{ URL::to('/regis') }}"
                            enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            <div>
                                <label>
                                    Email Address*:
                                </label>
                            </div>
                            <div class="input-group custom">
                                <input class="form-control form-control-lg" name="email" id="email" type="text"
                                    placeholder="Enter your email" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div>
                                <label>
                                    Username*:
                                </label>
                            </div>
                            <div class="input-group custom">
                                <input class="form-control form-control-lg" name="user" id="usrname" type="text"
                                    placeholder="Enter your username" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div>
                                <label>
                                    Password*:
                                </label>
                            </div>
                            <div class="input-group custom">
                                <!-- <input type="password" class="form-control form-control-lg" placeholder="**********" name="password"> -->
                                <input class="form-control form-control-lg" name="password" id="passwd" type="password"
                                    placeholder="Enter your password" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div>
                                <label>
                                    Confirm Password*:
                                </label>
                            </div>
                            <div class="input-group custom">
                                <input class="form-control form-control-lg" name="confirmpassword" id="retypasswd"
                                    type="password" placeholder="Enter your confirmed password" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Create
                                            Account</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- success Popup html Start -->
    <button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal"
        data-backdrop="static">Launch modal</button>

    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered max-width-400" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">Form Submitted!</h3>
                    <div class="mb-30 text-center"><img src="public/frontend/vendors/images/success.png"></div>
                    You're registerer sucessfully!.
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{ URL::to('/login') }}" class="btn btn-primary">Done</a>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="{{ asset('public/frontend/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('public/frontend/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('public/frontend/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('public/frontend/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('public/frontend/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/frontend/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/frontend/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/frontend/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/frontend/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/frontend/vendors/scripts/dashboard.js') }}"></script>
    <script src="{{ asset('public/frontend/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="{{ asset('public/frontend/vendors/scripts/steps-setting.js') }}"></script>
</body>

</html>
