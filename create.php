<?php
include "config.php";

$errors = array();

if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    // Basic validation
    if (empty($first_name)) {
        $errors[] = "First name is required";
    }

    if (empty($last_name)) {
        $errors[] = "Last name is required";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required";
    }

    // If there are no errors, proceed with database insertion
    if (empty($errors)) {
        $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$first_name','$last_name','$email','$password','$gender')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            header('Location: index.php');
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your existing styles remain unchanged */
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <form action="" method="POST">

                    <fieldset>
                        <legend>Personal information:</legend>

                        <?php
                        // Display validation errors if any
                        if (!empty($errors)) {
                            echo '<div class="alert alert-danger">';
                            foreach ($errors as $error) {
                                echo '<p>' . $error . '</p>';
                            }
                            echo '</div>';
                        }
                        ?>

                        <div class="form-group">
                            <label for="firstname">First name:</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last name:</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Gender:</label>
                            <div class="form-check">
                                <input type="radio" name="gender" value="Male" class="form-check-input" id="male" required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="gender" value="Female" class="form-check-input" id="female" required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
