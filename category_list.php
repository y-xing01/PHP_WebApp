<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories
              ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
<div id="test2" class="container-l">
    <?php
    include('includes/header.php');
    ?>
    <h1 id="textCenter">Category List</h1>
    <table class="table table-hover table-striped table-bordered">
        <tr class="text-center table-secondary">
            <th>Name</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
            <tr class="text-center table-active">
                <td class="pt-3"><?php echo $category['categoryName']; ?></td>
                <td>
                    <form action="delete_category.php" class="form-control-plaintext" method="post" id="delete_product_form">
                        <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2 id="textCenter">Add Category</h2>

    <form action="add_category.php" method="post" id="add_category_form">

        <div class="mb-3 ps-2 row g-3 justify-content-center">
            <div class="col-auto">
                <label for="formFile" class="form-control-plaintext">Name:</label>
            </div>
            <div class="col-6">
                <input class="form-control" type="input" name="name">
            </div>
        </div>
        <div class="d-flex mb-1 justify-content-center">
            <input class="bg-secondary col-1" id="add_category_button" type="submit" value="Add">
        </div>
    </form>
    <br>
    <div class="d-flex justify-content-end mt-5">
        <p class="fw-bolder text-dark"><a href="index.php">Back to Homepage</a></p>
    </div>

    <?php
    include('includes/footer.php');
    ?>