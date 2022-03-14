<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
<div id="test1" class="container-l">
    <?php
    include('includes/header.php');
    ?>
    <h1 style="text-align:center">Add Record</h1>
    <form action="add_record.php" method="post" enctype="multipart/form-data" id="add_record_form">

        <div class="mb-1 ms-5 ps-2 col-lg-9">
            <div style="text-align:center" class="col-auto ms-5">
                <label for="formFile" class="form-label ms-5">Category:</label>
                <select class="col-6 ms-3" name="category_id">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br>


        <div class="mb-3 ps-2 row g-3 justify-content-center">
            <div class="col-auto">
                <label for="formFile" class="form-control-plaintext">Name:</label>
            </div>
            <div class="col-6">
                <input class="form-control" type="input" name="name" required>
            </div>
        </div>
        <br>

        <div class="mb-3 pe-2 row g-3 justify-content-center">
            <div class="col-auto">
                <label>List Price:</label>
            </div>
            <div class="col-6">
                <input class="form-control" type="input" name="price" placeholder="Enter the Price Ex(00.00)" pattern="[0-9]+\.[0-9]{2,}">
            </div>
        </div>
        <br>

        <div class="mb-3 ps-2 row g-3 justify-content-center">
            <div class="col-auto">
                <label>Image:</label>
            </div>
            <div class="col-6">
                <input type="file" name="image" accept="image/*" />
            </div>
        </div>
        <br>

        <label>&nbsp;</label>
        <div class="d-flex mb-1 justify-content-center">
            <input class="bg-secondary" type="submit" value="Add Record">
        </div>
        <br>
    </form>
    <div id="homeButton" class="d-flex justify-content-end">
        <p class="fw-bolder text-dark"><a href="index.php">Back to Homepage</a></p>
    </div>
    <?php
    include('includes/footer.php');
    ?>