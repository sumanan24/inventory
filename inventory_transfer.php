<?php include_once('config.php'); ?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Document </title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('script.php'); ?>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">SLGTI</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="inventory_add.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name"> Add Inventory</span>
                </a>
                <span class="tooltip">Add Inventory</span>
            </li>
            <li>
                <a href="inventory_transfer.php">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Transfer Inventory</span>
                </a>
                <span class="tooltip">Transfer Inventory</span>
            </li>
            <li>
                <a href="inventory_dispose.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Disposed Inventory</span>
                </a>
                <span class="tooltip">Disposed Inventory</span>
            </li>
            
            <li class="profile">
                <div class="profile-details">
                    <img src="profile.jpg" alt="profileImg">
                    <div class="name_job">
                        <div class="name">Inushika</div>
                        <div class="job">Web designer</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <?php include_once('navg.php'); ?>
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