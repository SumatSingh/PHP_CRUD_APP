<?php include 'db.php';
// inserting data inside table
if (isset($_POST['submit'])) {
    // echo "Success";
    // get data and in input feild & store data in object
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    //insert query
    $sql = "insert into `employees` (name, email, mobile, address) values 
    ('$name', '$email', '$mobile', '$address')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Data insert successfully";
        header('location:table.php');
    } else {
        echo die("Data not insert");
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD_APP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .index_container {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: red; */
        }

        .index_div {
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

        .index_submit_div input {
            cursor: pointer;
        }

        .index_submit_div a {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="index_container">
        <div class="index_div">
            <h1> Home Crud App </h1>
            <form action=""
                method="post">
                <input type="text"
                    name="name"
                    placeholder="Enter Your Name"
                    required
                    autocomplete="off">
                <input type="email"
                    name="email"
                    placeholder="Enter Your email"
                    required
                    autocomplete="off">
                <input type="mobile"
                    name="mobile"
                    placeholder="Enter Your mobile"
                    required
                    autocomplete="off">
                <input type="text"
                    name="address"
                    placeholder="Enter Your address"
                    required
                    autocomplete="off">
                <div class='index_submit_div'>
                    <input type="submit"
                        name="submit">
                    <a href="table.php">View Details</a>

                </div>
            </form>
        </div>
    </div>

</body>

</html>