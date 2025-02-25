<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Serenity | Register</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 login-section-wrapper">
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Sign up</h1>
                        <form action="../php/register_process.php" method="POST" onsubmit="return validate();">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="firstname">First name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="lastname">Last name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="phonenumber">Phone number</label>
                                <input type="text" name="phone" id="phonenumber" class="form-control" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" id="date" class="form-control" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="gender">Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option value="">Choose...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" class="form-control" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <input name="register" id="register" class="btn btn-block login-btn" type="submit" value="register">
                        </form>
                        <p class="login-wrapper-footer-text">Already has an account? <a href="login.php" class="text-reset">Login here</a></p>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="images/login1.jpg" alt="login image" class="login-img">
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        function validate() {
            let first_name = document.getElementById('firstname').value;
            let password = document.getElementById('password').value;
            let phone_number = document.getElementById('phonenumber').value;

            if (first_name.length < 5 || first_name == "") {
                alert('The username should be more than 5 characters');
                return false;
            }

            if (password.length < 8 || password == "") {
                alert("password should be more than 8 characters");
                return false;
            }

            if (phone_number.length != 10) {
                alert("phone number should have 10 digits");
                return false;
            } 
            return true;
        }
    </script>
</body>
</html>
