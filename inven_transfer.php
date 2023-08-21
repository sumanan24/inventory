<?php include_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
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
<?php include_once('nav.php'); ?>
    <section class="home-section">
        
        <br>
        <div class="container">
            <div class="card-header">Transfer Inventory</div>
            <br>
            <div class="row">
                <div class="col-sm-6">

                    <form action="inventory_transfer.php" method="POST">


                        Transfer ID <input type="text" name="transfer_id" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required> <br>
                        Staff Name <br>
                        <?php
                        
                        $result = mysqli_query($con, "SELECT * FROM staff");
                        ?>
                        <select name="staff" id="s_id" width="100%" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                            <option value="">---Select---</option>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row['Staff_ID']; ?>"><?php echo $row['Full_Name']; ?></option>
                            <?php 
                            }
                            ?>
                        </select>
                        <br>
                        Inventory Name <br>
                        <?php
                       
                        $result = mysqli_query($con, "SELECT * FROM inventory");
                        ?>
                        <select name="inventory" id="inventory" width="100%" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                            <option value="">---Select---</option>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row['Inventory_ID']; ?>"><?php echo $row['Name']; ?></option>
                            <?php 
                            }
                            ?>
                        </select>
                </div>
                <div class="col-sm-6">

                    Sender D_Code <br>
                    <?php
                  
                    $result = mysqli_query($con, "SELECT * FROM department");
                    ?>
                    <select name="sender" id="sender" width="100%" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
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
                    
                    $result = mysqli_query($con, "SELECT * FROM department");
                    ?>
                    <select name="receiver" id="receiver" width="100%" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                        <option value="">---Select---</option>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option><?php echo $row['Department_Code']; ?></option>
                        <?php
                        }
                        ?>
                    </select> <br>
                    Quantity <input type="text" name="quantity" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required> <br>
                    Date <input type="date" name="date" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required> <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="reset" class="btn btn-dark" value="Clear" style="width: 100%">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-success" name="save" value="Save Changes" style="width: 100%">
                        </div>

                    </div>
                </div>
            </div>

            </form>
        </div>
        </div>
        <div class="col-sm-3"></div>
        </div>
        </div>
    </section>
    <script src="JS/script.js"></script>

</body>

</html>