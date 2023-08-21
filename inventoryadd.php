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
        <div class="container">
            <div class="card-header">Inventory</div>
            <br>
            <form action="inventory_add.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">

                        Inventory_ID <input type="text" name="in_id" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required><br>
                        Upload Image <br>
                        <input type="file" name="inventory_images" class="form-control" id="inventory_images" style="background-color: #E4E9F7; border:1px solid black;" required> <br>
                        Name <input type="text" name="in_name" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required><br>
                    </div>
                    <div class="col-sm-6">
                        Description <input type="text" name="desc" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required><br>
                        Quantity <input type="text" name="quantity" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required><br>
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

    </section>
    <script src="JS/script.js"></script>

</body>

</html>