<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    $query = "SELECT * FROM users WHERE email='$email' AND otp='$otp'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $query = "UPDATE users SET is_verified=1 WHERE email='$email'";
        if (mysqli_query($conn, $query)) {
            header('Location: login.php');
        } else {
            $error = "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        $error = "Invalid OTP";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h2>Email Verification</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="otp">OTP</label>
                                <input type="text" name="otp" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
