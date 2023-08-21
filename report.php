<?php include_once('config.php'); ?>
<?php include_once('script.php'); ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="card" style="border:2px" ;>
            <div class="card-body">
                <br>
                <center>
                    <h3>SLGTI Inventory Management</h3>
                </center>
                <br><br>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">


                        <?php
                        if (isset($_POST['print'])) {
                            $id = $_POST['print_id'];
                            $query = "SELECT * FROM transfer WHERE ID='$id'";
                            $query_run = mysqli_query($con, $query);

                            foreach ($query_run as $row) {
                        ?>


                                <form action="inventory_transfer.php" method="POST">


                                    Transfer ID <input type="text" name="transfer_id" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Transfer_ID']; ?>" required> <br>
                                    Staff Name <br>
                                    <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'inventory_db');
                                    $result = mysqli_query($con, "SELECT * FROM staff");
                                    ?>
                                    <select name="staff" id="s_id" width="100%" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                                        <option value="">---Select---</option>
                                        <?php
                                        while ($row1 = mysqli_fetch_array($result)) {
                                            if ($row['D_Code'] == $row1['Department_Code']) 
                                            {
                                        ?>
                                                <option selected value="<?php echo $row1['Staff_ID']; ?>"></option>

                                            <?php
                                            }
                                        ?>
                                            <option value="<?php echo $row1['Staff_ID']; ?>"><?php echo $row['Full_Name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    Inventory Name <br>
                                    <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'inventory_db');
                                    $result = mysqli_query($con, "SELECT * FROM inventory");
                                    ?>
                                    <select name="inventory" id="inventory" width="100%" value="<?php echo $row['Inventory_ID']; ?>" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                                        <option value="">---Select---</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $row['Inventory_ID']; ?>"><?php echo $row['Name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                   

                        Sender D_Code <br>
                        <?php
                                $con = mysqli_connect('localhost', 'root', '', 'inventory_db');
                                $result = mysqli_query($con, "SELECT * FROM department");
                        ?>
                        <select name="sender" id="sender" width="100%" value="<?php echo $row['Sender_D_Code']; ?>" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                            <option value="">---Select---</option>
                            <?php
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option><?php echo $row['Department_Code']; ?></option>
                            <?php
                                }
                            ?>
                        </select> <br>

                        Receiver D_Code <br>
                        <?php
                                $con = mysqli_connect('localhost', 'root', '', 'inventory_db');
                                $result = mysqli_query($con, "SELECT * FROM department");
                        ?>
                        <select name="receiver" id="receiver" width="100%"  class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                            <option value="">---Select---</option>
                            <?php
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option><?php echo $row['Receiver_D_Code']; ?></option>
                            <?php
                                }
                            ?>
                        </select> <br>
                        Quantity <input type="text" name="quantity" class="form-control" value="<?php echo $row['Quantity']; ?>" style="background-color: #E4E9F7; border:1px solid black;" required> <br>
                        Date <input type="date" name="date" class="form-control"  value="<?php echo $row['Date']; ?>" style="background-color: #E4E9F7; border:1px solid black;" required> <br>
                    </div>
                </div>
                
                </form>
                </form>
        <?php
                            }
                        }
        ?>

            </div>
        </div>
    </div>
    </div>



</body>

</html>