<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(
        INPUT_GET,
        'category_id',
        FILTER_VALIDATE_INT
    );
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
?>
<?php
require('db.php');
include("auth_session.php");
?>
<?php
include('includes/header.php');
?>
<div id="test1" class="container-l">
    <section>
        <!-- display a table of records -->
        <div class="d-flex flex-row justify-content-between mt-3">
            <h2><?php echo $category_name; ?></h2>
            <form class="d-flex" action="search.php" method="post">
                <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark bg-primary" type="submit" name="submit" >Search</button>
            </form>
           
            
        </div>

        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr class="text-center table-secondary">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record) : ?>
                    <tr class=" ">
                        <td><img src="image_uploads/<?php echo $record['image']; ?>" width="100px" height="110px" /></td>
                        <td class="pt-5"><?php echo $record['name']; ?></td>
                        <td class="pt-5 right"><?php echo $record['price']; ?></td>
                        <td class="pt-5">
                            <form action="delete_record.php" method="post" id="delete_record_form">
                                <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                                <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                                <input class="bg-secondary" type="submit" value="Delete">
                            </form>
                        </td>
                        <td class="pt-5">
                            <form action="edit_record_form.php" method="post" id="delete_record_form">
                                <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                                <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                                <input class="bg-secondary" type="submit" value="Edit">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </section>