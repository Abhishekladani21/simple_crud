<?php
include "config.php";

// $sql = "SELECT firstname, lastname, email users INNER JOIN posts ON users.id = posts.user_id";
// $sql = "SELECT * FROM orders LEFT JOIN customers ON orders.customer_id = customers.id";
$sql = "SELECT customers.*, orders.*
FROM customers
INNER JOIN orders ON customers.id = orders.customer_id";

$result = mysqli_query($conn, $sql);
// $data = mysqli_fetch_assoc($result);

// INSERT INTO `posts` (`id`, `name`, `user_id`, `tag`) VALUES (NULL, 'Social Post', '13', '#');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #007bff;
        }

        .btn-primary,
        .btn-info,
        .btn-danger,
        .btn-success {
            margin-right: 5px;
        }

        .table {
            margin-top: 20px;
            background-color: #fff;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Customers</h2>


        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Order Date</th>
                    <th>Order Detils</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['customer_name']; ?></td>
                            <td><?php echo $row['order_date']; ?></td>
                            <td><?php echo $row['order_name']; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
