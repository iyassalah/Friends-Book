<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../Styles/registerStyle.css"> -->
    <title>Register</title>
    <?php
    require_once '../controllers/register-controller.php';
    ?>
    <style>
        <?php
        include '../Styles/registerStyle.css';
        ?>
    </style>
</head>

<body>
    <div id="register">
        <div class="container">
            <div id="register-row" class="row justify-content-center align-items-center">
                <div id="register-column" class="col-md-6">
                    <div class="register-box col-md-12">
                        <form id="register-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Register</h3>
                            <div class="form-group">
                                <label for="firstname" class="text-info">First name:</label><br>
                                <input type="text" name="firstname" id="firstname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="text-info">Last name:</label><br>
                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tele-number" class="text-info">Telephone number:</label><br>
                                <input type="tel" name="tele-number" id="tele-number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address" class="text-info">Address</label><br>
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>
                            <div class="form-group one-line" style="width: 50%;">
                                <label class="text-info" for="sex">Sex</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" required>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Male
                                    </label>
                                </div>
                            </div>
                            <div class="form-group one-line">
                                <label class="text-info" for="img">Select image:</label>
                                <input type="file" id="profile-img" name="img" accept="image/*">
                            </div>
                            <br>
                            <div class="form-group one-line">
                                <input type="submit" name="Register" class="btn btn-info btn-md" value="Register">
                                <a href="login.php" class="text-info">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>