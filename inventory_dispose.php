<?php include_once('config.php'); ?>
<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Staff Panel </title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('script.php'); ?>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <section class="home-section">
       
        <br>



        <br>
        <div class="container">
            <div class="row">
                <div class=col-sm-1></div>
                <div class=col-sm-10>

                    <div class="card-header">Disposed Inventory
                    </div>
                    <br>
                   
                        <br>
                        <table class="table">
                            <div class="table-responsive">
                                <thead class="thead">
                                    <tr id="header">
                                        <th scope="col">Inventory_ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Date</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = 'SELECT * FROM dispose';
                                    $result = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($result) > 0){
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>
                                                <td>', $row['Inventory_ID'], '</td>
                                                <td>', $row['Image'], '</td>
                                                <td>', $row['Name'], '</td>
                                                <td>', $row['Description'], '</td>
                                                <td>', $row['Quantity'], '</td>
                                                <td>', $row['Date'], '</td>
                                                <td>
                                                 <a href="?delete=', $row['ID'],'">Delete</a>
                                                </td>
                                                </tr>
                                                ';
                                        }
                                    } else {
                                        echo "No data";
                                    }
                                    ?>
                                </tbody>
                        </table>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="JS/script.js"></script>

</body>

</html>