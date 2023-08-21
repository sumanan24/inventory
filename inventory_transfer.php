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
    <title> Document </title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('script.php'); ?>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <section class="home-section">

        <br>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class=col-sm-10>


                <?php
                //insert
                if (isset($_POST['save'])) {
                    $transfer = $_POST['transfer_id'];
                    $staff = $_POST['staff'];
                    $inventory = $_POST['inventory'];
                    $sender = $_POST['sender'];
                    $receiver = $_POST['receiver'];
                    $date = $_POST['date'];
                    $quantity = $_POST['quantity'];
                    $sql = "INSERT INTO transfer(Transfer_ID,Staff_ID,Inventory_ID,Sender_D_Code,Receiver_D_Code,Quantity,Date) 
                    VALUES('$transfer','$staff','$inventory','$sender','$receiver','$quantity','$date')";

                    if (mysqli_query($con, $sql)) {
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Insert Success
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    } else {
                        echo "error:" . mysqli_error($con);
                    }
                }
                ?>

                <?php
                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $sql = "DELETE * FROM transfer WHERE ID='$id'";
                    $sql_run = mysqli_query($con, $sql);
                    if ($sql_run) {
                ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Delete Success
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    } else {
                        echo "Not deleted";
                    }
                }
                ?>


                <div class="card-header">Inventory
                    <a class="btn btn-dark" href="i_transfer.php" role="button">+ADD</a>
                </div>
                <br>
                <div class="card" style="background-color: #bcc0cc;">
                    <br>
                    <div class="card-body">


                        <div class="table-responsive">
                            <?php
                            $query = "SELECT * FROM transfer";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                            ?>
                                <table class="table">

                                    <thead class="thead">
                                        <tr id="header">
                                            <th scope="col">Transfer ID</th>
                                            <th scope="col">Staff ID</th>
                                            <th scope="col">Inventory ID</th>
                                            <th scope="col">Sender D_Code</th>
                                            <th scope="col">Receiver D_Code</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        while ($row = mysqli_fetch_assoc($query_run)) {

                                        ?>
                                            <tr>
                                                <td><?php echo $row['Transfer_ID']; ?></td>
                                                <td><?php echo $row['Staff_ID']; ?></td>
                                                <td><?php echo $row['Inventory_ID']; ?></td>
                                                <td><?php echo $row['Sender_D_Code']; ?></td>
                                                <td><?php echo $row['Receiver_D_Code']; ?></td>
                                                <td><?php echo $row['Quantity']; ?></td>
                                                <td><?php echo $row['Date']; ?></td>
                                                <td>
                                                    <form action="edit_i_transfer.php" method="POST">
                                                        <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>">
                                                        <button type="submit" name="edit" class="btn btn-sm btn-outline-success editbtn">Edit</button>
                                                        <a href="?delete='<?php echo $row['ID'] ?>'" class="btn btn-sm btn-outline-danger remove">Delete</a>
                                                    </form>
                                                    <br>

                                                </td>
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
            <div class="col-sm-1"></div>
    </section>

    <script src="JS/script.js"></script>

</body>

</html>