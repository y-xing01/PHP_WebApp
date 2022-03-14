<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
<div id="test1" class="container-l">
       <?php
       include('includes/header.php');
       ?>
       <h1 style="text-align:center">Edit Product</h1>
       <form action="edit_record.php" method="post" enctype="multipart/form-data" id="add_record_form">
              <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
              <input type="hidden" name="record_id" value="<?php echo $records['recordID']; ?>">

              <div class="mb-1 pe-5 row g-3 justify-content-center">
                     <div class="col-auto">
                            <label for="inputPassword" class="form-control-plaintext">Category ID:</label>
                     </div>
                     <div class="col-6">
                            <input class="form-control" id="inputPassword" type="category_id" name="category_id" value="<?php echo $records['categoryID']; ?>">
                     </div>
              </div>
              <br>

              <div class="mb-1 ps-2 row g-3 justify-content-center">
                     <div class="col-auto">
                            <label for="formFile" class="form-label">Name:</label>
                     </div>
                     <div class="col-6">
                            <input class="form-control" type="input" name="name" value="<?php echo $records['name']; ?>">
                     </div>
              </div>
              <br>

              <div class="mb-1 pe-3 row g-3 justify-content-center">
                     <div class="col-auto">
                            <label for="formFile" class="form-label">List Price:</label>
                     </div>
                     <div class="col-6">
                            <input class="form-control" type="input" name="price" value="<?php echo $records['price']; ?>">
                     </div>
              </div>
              <br>

              <div class="mb-1 ps-2 row g-3 justify-content-center">
                     <div class="col-auto">
                            <label for="formFile" class="form-label">Image:</label>
                     </div>
                     <div class="col-6">
                            <input class="form-control" type="file" name="image" accept="image/*" />
                     </div>

              </div>
              <br>
              <div class="d-flex justify-content-center">
                     <?php if ($records['image'] != "") { ?>
                            <p><img src="image_uploads/<?php echo $records['image']; ?>" height="200" /></p>
                     <?php } ?>
              </div>

              <label>&nbsp;</label>
              <div class="d-flex mb-1 justify-content-center">
                     <input class="bg-secondary" type="submit" value="Save Changes">
              </div>
              <br>
              <div class="d-flex justify-content-end">
                     <p class="fw-bolder text-dark"><a href="index.php">Back to Homepage</a></p>
              </div>
       </form>
       <?php
       include('includes/footer.php');
       ?>