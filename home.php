<?php
include 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login - Register</title>
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




        <div style="display: flex;  flex-direction: column; justify-content: center; align-items: center; margin:40px 0 0 0;">


            <p style="font-size:50px; font-weight:bold; color:white;">
                <?php
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email='$email'");
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<img src='" . $row['profile_image'] . "' alt='Profile Picture' width='100' height='100'>";
                        echo 'Hello ' . $row['first'] . ' ' . $row['last'] ;
                    }
                }
                ?>
                👋
            </p>



            <img src="css/logo.png" alt="HOME" width="300px">

            <a href="logout.php" style="text-decoration: none; color:white; padding:10px;
                border: solid white 3px; border-radius:25px; margin-top:40px;">LogOut</a>


        </div>













    </section>















</body>

</html>