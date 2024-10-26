<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h1>Registration Form</h1>
                </div>
                <div class="panel-body">
                    <form action="connect.php" method="post">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div>
                                <label for="male" class="radio-inline">
                                    <input type="radio" name="gender" value="m" id="male" required> Male
                                </label>
                                <label for="female" class="radio-inline">
                                    <input type="radio" name="gender" value="f" id="female" required> Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Phone Number</label>
                            <input type="tel" class="form-control" id="number" name="number" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
</body>
</html>