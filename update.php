<?php
include 'db.php';

// update query
if (isset($_POST['update_btn'])) {
    // echo "Success";
    // get data and in input feild & store data in object
    $data_id = $_POST['data_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $sql = "update `employees` set name='$name', email='$email', 
    mobile='$mobile', address='$address' where id=$data_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Update Successfully";
    } else {
        echo " Not updated";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Update Employees Data</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .update_container {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: red; */
        }

        .update_div {
            width: 600px;
            height: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ccc;
            /* justify-content: center; */
        }

        h1 {
            margin-top: 40px;
        }

        form {
            display: flex;
            flex-direction: column;
            height: 300px;
            width: 400px;
            /* background-color: blue; */
        }

        form input {
            margin: 10px;
            padding: 10px;
            /* background-color: #ccb; */
        }

        .update_submit_div input {
            cursor: pointer;
        }

        .update_submit_div a {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="update_container">
        <div class="update_div">

            <h1>Update Data</h1>
            <?php

            //* get data in table.php url
            if (isset($_GET['edit'])) {
                $edit_id = $_GET['edit'];
                //* echo $edit_id;
            
                //* get data query
                $get_data = mysqli_query($conn, "Select * from `employees` where
    id=$edit_id");
                if (mysqli_num_rows($get_data) > 0) {
                    $fetch_data = mysqli_fetch_assoc($get_data);

                    ?>

                    <form action=""
                        method="post">
                        <input type="hidden"
                            name="data_id"
                            value="<?php echo $fetch_data['id'] ?>">
                        <input type="text"
                            name="name"
                            value="<?php echo $fetch_data['name'] ?>"
                            required
                            autocomplete="off">
                        <input type="email"
                            name="email"
                            value="<?php echo $fetch_data['email'] ?>"
                            required
                            autocomplete="off">
                        <input type="mobile"
                            name="mobile"
                            value="<?php echo $fetch_data['mobile'] ?>"
                            required
                            autocomplete="off">
                        <input type="text"
                            name="address"
                            value="<?php echo $fetch_data['address'] ?>"
                            required
                            autocomplete="off">
                        <div class='update_submit_div'>
                            <input type="submit"
                                name="update_btn"
                                value="update">
                            <!-- <button>Update</button> -->
                            <a href="table.php">Back</a>&nbsp; &nbsp;
                            <a href="index.php">Home</a>
                        </div>
                    </form>

                    <?php
                } else {
                    echo "
                 <div>Don't Match Employee Id From Database</div>
                 <span>Please Check Database</span>

                 ";
                }
            }
            ?>
            <!-- <a href="table.php">Back</a> -->

        </div>
    </div>
</body>

</html>