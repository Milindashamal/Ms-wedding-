// Register form data input
<?php

include 'connectdb.php';

if (isset($_POST['signUp'])){
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $date=$_POST['weddingdate'];
    $service=$_POST['servicetype'];


        $checkEmail="SELECT * FROM user WHERE email='$email'";
        $result=$conn->query($checkEmail);
        if($result->num_rows>0){
            echo "<script>
                    alert('Email Address is already exists !');
                </script>";
        }
        else{
            $insertQuery="INSERT INTO user (name,email,password,wed_date,servicetype)
             VALUES ('$name','$email','$password','$date','$service')";
                if($conn->query($insertQuery)==TRUE){
                    echo "<script>
                        alert('Registered Successful !');
                        window.location.href = 'login.php';
                    </script>";
                }
                else{
                    echo "Error:".$conn->error;
                }
        }

}
?>

// Login form data input
<?php 

include 'connectdb.php';

if (isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM user WHERE email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        
        // Check if the email is the admin email
        if ($email == 'admin@example.com') {
            echo "<script>
                    alert('Enter Admin Login Pannel !');
                    window.location.href = 'admin/index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Logging Successful !');
                    window.location.href = 'user/homepage.php';
                </script>";
        }
        exit();
    }
    else{
        echo "<script>
                    alert('Not Found, Incorrect Email or Password !');
                    window.location.href = 'login.php';
                </script>";
    }

}

?>

// contact form data input
<?php

  include 'connectdb.php';

    if (isset($_POST['contactUp'])){
        $fname=$_POST['firstName'];
        $lname=$_POST['lastName'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $message=$_POST['message'];

        $insertQuery="INSERT INTO contact(contact_fname,contact_lname,contact_email,contact_phone,contact_message)
            VALUES ('$fname','$lname','$email','$phone','$message')";

        if($conn->query($insertQuery)==TRUE){
            echo "<script>
                    alert('Data Send Successful!');
                    window.location.href = 'contact.php';
                </script>";
        }  
        else {
            echo "Error:".$conn->error;
        }
    }

?> 