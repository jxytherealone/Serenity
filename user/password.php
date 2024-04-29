<?php 
        include('../php/config.php');

        if (isset($_POST['update']) && isset($_COOKIE['uid'])) {
          $id = $_COOKIE['uid'];
          $new = $_POST['newpass'];
          $con = $_POST['con'];

          $sql = "UPDATE users SET password = ? WHERE id = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("ss", $new, $id);
          $stmt->execute();
          echo '<script>alert("Succesfully updated your password"); </script>';
          echo '<script> window.location.href="home.php"; </script>';
        }
    ?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="../images/note.png">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Serenity | Update Password</title>


  <!-- bootstrap core css -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />


  <!-- Custom styles for the drop-down box -->
  <style>
    /* Style for the drop-down box */
    .nav-item.dropdown {
      position: relative;
    }

    .nav-link.dropdown-toggle::after {
      display: none;
    }

    .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 1000;
      display: none;
      float: left;
      min-width: 10rem;
      padding: 0.5rem 0;
      margin: 0;
      font-size: 1rem;
      color: #212529;
      text-align: left;
      list-style: none;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, 0.15);
      border-radius: 0.25rem;
    }

    .nav-item.dropdown:hover .dropdown-menu {
      display: block;
    }
    .custom-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        .custom-form label {
            font-weight: bold;
        }
        .feedback-list {
            margin-top: 20px;
        }

        .feedback-card {
            background-color: #fff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .feedback-card h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .feedback-card p {
            margin: 0;
        }
  </style>
</head>

<body>
  <div class="container">
        <div class="custom-form">
            <h1 style="text-align: center; padding: 25px;">Update Password</h1>
            <form method="post" action="password.php" onsubmit="return validate();">
                <!-- Name input -->
                <div class="form-group">
                    <label for="form4Example1">New password</label>
                    <input type="password" class="form-control" name="newpass" id="newpass"/>
                </div>

                <!-- Email input -->
                <div class="form-group">
                    <label for="form4Example2">Confirm password</label>
                    <input type="password" class="form-control" name="con" id="con"/>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
            </form>
        </div>
    </div>


  <!-- footer section -->

  <!-- jQery -->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="../js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="../js/custom.js"></script>

  <script>
     function validate() {
            var newpass = document.getElementById('newpass').value;
            var con = document.getElementById('con').value;

            if (newpass !== con) {
                alert('Passwords do not match.');
                return false;
            }

            if (newpass.length < 8) {
                alert('Password should be at least 8 characters long.');
                return false;
            }
            return true;
        }

  </script>


</body>

</html>