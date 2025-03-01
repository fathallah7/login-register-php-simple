<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Home Page</title>
</head>

<body>

    <section class="background-radial-gradient overflow-hidden" style="height: 100vh;">
        <style>
            .background-radial-gradient {
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(650px circle at 0% 0%,
                        hsl(218, 41%, 35%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        hsl(218, 41%, 45%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%);
            }

            #radius-shape-1,
            #radius-shape-2 {
                position: absolute;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-1 {
                height: 220px;
                width: 220px;
                top: -60px;
                left: -130px;
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: -110px;
                width: 300px;
                height: 300px;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }
        </style>





        <?php
        include 'msg.php';
        ?>



        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">

            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Login Page<br />
                        <span style="color: hsl(218, 81%, 75%)">Abdullah Fathallah</span>
                    </h1>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <!-- Sign UPPP -->
                    <div class="card bg-glass" id="signUp" style="display: none;">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form action="registerANDlogin.php" method="post" enctype="multipart/form-data" >
                                <div class="row">

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="firstName" class="form-control" name="firstName" />
                                            <label class="form-label" for="firstName">First name</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="lastName" class="form-control" name="lastName" />
                                            <label class="form-label" for="lastName">Last name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="file" id="profileImage" class="form-control" name="profileImage" accept="image/*" />
                                    <label class="form-label" for="profileImage">Profile Picture</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" id="emailSignUp" class="form-control" name="email" />
                                    <label class="form-label" for="emailSignUp">Email address</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="passwordSignUp" class="form-control" name="password" />
                                    <label class="form-label" for="passwordSignUp">Password</label>
                                </div>

                                <input type="submit" class="btn btn-primary btn-block mb-4" id="signUpButton" value="SignUp" name="signUp">

                                <p class="text-center mt-3">
                                    have an account? <a href="#" id="showSignIn">Sign In</a>
                                </p>

                            </form>
                        </div>
                    </div>




                    <!-- Sign UPPP -->
                    <div class="card bg-glass" id="signIn">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form action="registerANDlogin.php" method="post">
                                <div class="form-outline mb-4">
                                    <input type="email" id="emailSignIn" class="form-control" name="emailLogin" />
                                    <label class="form-label" for="emailSignIn">Email address</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="passwordSignIn" class="form-control" name="passwordLogin" />
                                    <label class="form-label" for="passwordSignIn">Password</label>
                                </div>

                                <input type="submit" class="btn btn-primary btn-block mb-4" id="signInButton" value="Sign" name="signIn">


                                <p class="text-center mt-3">
                                    Don't have an account? <a href="#" id="showSignUp">Sign up</a>
                                </p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>














    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const signUpButton = document.getElementById('signUpButton');
            const signInButton = document.getElementById('signInButton');
            const signInForm = document.getElementById('signIn');
            const signUpForm = document.getElementById('signUp');
            const showSignUp = document.getElementById('showSignUp');
            const showSignIn = document.getElementById('showSignIn');

            // إخفاء نموذج التسجيل عند بدء التشغيل وعرض نموذج تسجيل الدخول
            signUpForm.style.display = "none";

            signUpButton.addEventListener('click', function() {
                signInForm.style.display = "none";
                signUpForm.style.display = "block";
            });

            signInButton.addEventListener('click', function() {
                signInForm.style.display = "block";
                signUpForm.style.display = "none";
            });

            showSignUp.addEventListener('click', function(e) {
                e.preventDefault();
                signInForm.style.display = "none";
                signUpForm.style.display = "block";
            });

            showSignIn.addEventListener('click', function(e) {
                e.preventDefault();
                signInForm.style.display = "block";
                signUpForm.style.display = "none";
            });
        });
    </script>


</body>

</html>