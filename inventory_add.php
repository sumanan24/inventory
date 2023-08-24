<?php include_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title> Document </title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('script.php'); ?>
</head>

<body>
    <?php include_once('nav2.php') ?>
    <section class="home-section">

        <br>
        <div class="row">
            <div class=col-sm-1></div>
            <div class=col-sm-10>



                <?php
                if (isset($_POST['save'])) {
                    $user = $_SESSION['user'];
                    $query1 = "SELECT * FROM staff where Username='$user'";
                    $query_run1 = mysqli_query($con, $query1);
                    $r = mysqli_fetch_assoc($query_run1);
                    $dcode = $r['Department_Name'];
                    $in_id = $_POST['in_id'];
                    $images = $_FILES["inventory_images"]['name'];
                    $in_name = $_POST['in_name'];
                    $description = $_POST['desc'];
                    $quantity = $_POST['quantity'];
                    $date = $_POST['date'];
                    

                    if (file_exists("upload/" . $_FILES["inventory_images"]['name'])) {
                        $store = $_FILES["inventory_images"]['name'];
                    } else {
                        $sql = "INSERT INTO inventory(Inventory_ID,Image,Name,Description,Quantity,Date,dcode) VALUES('$in_id','$images','$in_name','$description','$quantity','$date','$dcode')";
                        $sql_run = mysqli_query($con, $sql);

                        if ($sql_run) {
                            move_uploaded_file($_FILES["inventory_images"]["tmp_name"], "upload/" . $_FILES["inventory_images"]["name"]);
                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Insert Success
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                <?php
                        } else {
                            echo "error:" . mysqli_errno($con);
                        }
                    }
                }
                ?>
                <?php
                if (isset($_POST['updatebtn'])) {
                    $id = $_POST['edit_id'];

                    $in_name = $_POST['in_name'];
                    $description = $_POST['desc'];
                    $quantity = $_POST['quantity'];
                    $date = $_POST['date'];

                    $sql = "UPDATE inventory SET Name='$in_name',Description='$description',Quantity='$quantity',Date='$date' WHERE ID='$id'";
                    $sql_run = mysqli_query($con, $sql);
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Updated Successfully
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>

                <?php
                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $sql = "DELETE FROM inventory WHERE ID=$id";
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
                        echo "error: " . mysqli_error($con);
                    }
                }
                ?>

                <div class="card-header">Inventory</div> <br>
                <a class="btn btn-dark" href="inventoryadd.php" role="button">Add</a>
                <a class="btn btn-dark" href="inventory_transfer.php" role="button">Transfer</a>
                
                <br><br>
                <div class="card" style="background-color: #bcc0cc;">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                $user = $_SESSION['user'];
                                $query1 = "SELECT * FROM staff where Username='$user'";
                                $query_run1 = mysqli_query($con, $query1);
                                $r = mysqli_fetch_assoc($query_run1);
                                $dcode = $r['Department_Name'];
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
                                                <th scope="col">Action</th>
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
                                                    <td>
                                                        <form action="edit_i_add.php" method="POST">
                                                            <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>">
                                                            <button type="submit" name="edit" class="btn btn-sm btn-outline-success editbtn">Edit</button>
                                                            <a href="?delete='<?php echo $row['ID'] ?>'" class="btn btn-sm btn-outline-danger remove">Dispose</a>

                                                        </form>

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
            </div>
        </div>



    </section>

    <script src="JS/script.js"></script>

</body>

</html>