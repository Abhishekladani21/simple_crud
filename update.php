<?php
include "config.php";

if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $user_id = $_POST['user_id'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location: index.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $first_name = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password  = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Update Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            font-size: 36px;
            color: #007bff;
            margin-bottom: 30px;
        }

        fieldset {
            border: 2px solid #007bff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        legend {
            text-align: center;
            font-size: 24px;
            color: #007bff;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #f5f5f5;
            color: #333;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>User Update Form</h2>
        <fieldset>
            <legend>Personal Information:</legend>

            First name:<br>
            <input type="text" name="firstname" value="<?php echo $first_name; ?>">
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <br>

            Last name:<br>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>">
            <br>

            Email:<br>
            <input type="email" name="email" value="<?php echo $email; ?>">
            <br>

            Password:<br>
            <input type="password" name="password" value="<?php echo $password; ?>">
            <br>

            Gender:<br>
            <input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') {
                                                                echo "checked";
                                                            } ?>>Male
            <input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') {
                                                                    echo "checked";
                                                                } ?>>Female
            <br><br>

            <input type="submit" value="Update" name="update">
        </fieldset>
    </form>
</body>

</html>
<?php
        } else {
            header('Location: view.php');
        }
    }
?>
