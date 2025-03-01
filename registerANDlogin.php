<?php

include 'connect.php';
session_start();


if (isset($_POST['signUp'])) {
    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_FILES['profileImage']['name'])) {
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['email'];
        $pass = ($_POST['password']); // تشفير كلمة المرور
        $imageName = $_FILES['profileImage']['name'];
        $imageTmpName = $_FILES['profileImage']['tmp_name'];

        // تحديد مسار حفظ الصورة
        $uploadDir = 'uploads/'; // المسار المطلق للمجلد
        $imagePath = $uploadDir . basename($imageName); // بناء المسار الكامل

        // إنشاء المجلد إذا لم يكن موجودًا
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // إنشاء المجلد مع صلاحيات 755
        }

        // التحقق من وجود بريد إلكتروني سابق
        $checkEmail = "SELECT * FROM `accounts` WHERE `email` ='$email'";
        $checkResult = mysqli_query($conn, $checkEmail); 

        if ($checkResult->num_rows > 0) {
            $_SESSION['error'] = "This Email is Already Registered!";
            header("Location: index.php");
            exit();
        } else {
            // تحميل الصورة إلى المجلد المحدد
            if (move_uploaded_file($imageTmpName, $imagePath)) {
                // إدخال البيانات في قاعدة البيانات
                $insertInfo = "INSERT INTO `accounts`(`first`, `last`, `email`, `password`, `profile_image`) 
                                VALUES ('$fname', '$lname', '$email', '$pass', '$imagePath')";
                $insertResult = mysqli_query($conn, $insertInfo);

                if ($insertResult) {
                    $_SESSION['msg'] = "You Have Signed Up Successfully!";
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error:" . $conn->error;
                }
            } else {
                echo "Error: Failed to move uploaded file.";
                echo "Tmp Path: " . $imageTmpName . "<br>";
                echo "Target Path: " . $imagePath . "<br>";
                echo "Upload Error Code: " . $_FILES['profileImage']['error'] . "<br>";
                exit();
            }
        }
    } else {
        $_SESSION['error'] = "Please Enter All Information!";
        header("Location: index.php");
        exit();
    }
}



if (isset($_POST['signIn'])) {
    if (!empty($_POST['emailLogin'])  && !empty($_POST['passwordLogin'])) {
        $emailLogin = $_POST['emailLogin'];
        $passwordLogin = $_POST['passwordLogin'];

        $loginSql = "SELECT * FROM `accounts` WHERE `email` = '$emailLogin' and `password` = '$passwordLogin' ";
        $loginResult = mysqli_query($conn, $loginSql);

        if ($loginResult->num_rows > 0) {
            session_start();
            $row = $loginResult->fetch_assoc();
            $_SESSION['email'] = $row['email'];
            $_SESSION['msg'] = "You Have Signed IN";
            header("Location:home.php");
            exit();
        } else {
            header("Location: index.php");
            $_SESSION['error'] = "ًWrong Email or Password!";
            exit();
        }
    } else {
        header("Location: index.php");
        $_SESSION['error'] = "ًPlease Enter Your Email and Password!";
        exit();
    }
}
