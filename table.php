<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Data</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .table_container {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: red; */
        }

        .table_div {
            width: 700px;
            height: 600px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ccc;
            /* justify-content: center; */
        }

        .table_data_div {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-top: 20px;
        }

        .table_data_div a {
            font-size: 20px;
        }

        table {
            width: 600px;
            height: 400px;
            margin-top: 10px;
            /* color: #abc; */
            /* background-color: blue; */
            /* border: 5px double yellow; */
        }

        th,
        td {
            border: 2px dotted black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="table_container">
        <div class="table_div">
            <div class="table_data_div">
                <h1>Employees Data</h1>
                <a href="index.php">Back</a>
            </div>
            <table>
                <thead>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Opertions</th>
                </thead>
                <tbody>
                    <?php
                    $display_data = mysqli_query($conn, "select * from `employees` ");
                    $num = 1;
                    if (mysqli_num_rows($display_data) > 0) {
                        while ($row = mysqli_fetch_assoc($display_data)) {
                            // echo $row['name'];
                            ?>

                            <tr>
                                <td>
                                    <?php echo $num ?>
                                </td>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['mobile'] ?>
                                </td>
                                <td>
                                    <?php echo $row['address'] ?>
                                </td>
                                <td>
                                    <a href="delete.php?delete=<?php echo $row['id'] ?>"
                                        onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                                    <a href="update.php?edit=<?php echo $row['id'] ?>">Edit</a>
                                </td>
                            </tr>

                            <?php
                            $num++;
                        }
                    } else {
                        echo "<div>No Data</div>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>