<?php include_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/card.css">
    <?php include_once('script.php'); ?>
</head>

<body>
    <?php include_once('nav2.php'); ?>
    <section class="home-section">


        <br>
        <h3> &nbsp; &nbsp;Staff Dashboard</h3>
        <br>
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">
                        <?php
                        $sql = "SELECT count('Inventory_ID') as total FROM inventory";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) == 1) {
                            $r = mysqli_fetch_assoc($result);
                            echo $r['total'];
                        }
                        ?>
                    </div>
                    <div class="cardName">Inventory</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">
                        <?php
                        $sql = "SELECT count('Department_Code') as total FROM Department";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) == 1) {
                            $r = mysqli_fetch_assoc($result);
                            echo $r['total'];
                        }
                        ?>
                    </div>
                    <div class="cardName">Department</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>


            <div class="card">
                <div>
                    <div class="numbers">4</div>
                    <div class="cardName">Staff</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        $user=$_SESSION['user'];
                        $query1 = "SELECT * FROM staff where Username='$user'";
                        $query_run1 = mysqli_query($con, $query1);
                        $r = mysqli_fetch_assoc($query_run1);
                        $dcode= $r['Department_Name'];
                        $query = "SELECT * FROM inventory where dcode='$dcode'";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                        ?>

                            <table class="table">
                                <thead class="thead">
                                    <tr id="header">
                                        <th scope="col">Inventory_ID</th>
                                        <th scope="col">Images</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Date</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($query_run)) {

                                    ?>
                                        <tr>
                                            <td><?php echo $row['Inventory_ID']; ?></td>
                                            <td><?php echo '<img src="upload/' . $row['Image'] . '" width="100px;" height="100px;" alt="Image">' ?> </td>
                                            <td><?php echo $row['Name']; ?></td>

                                            <td><?php echo $row['Description']; ?></td>
                                            <td><?php echo $row['Quantity']; ?></td>
                                            <td><?php echo $row['Date']; ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="JS/script.js"></script>

</body>

</html>