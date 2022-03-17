<?php
if (isset($_POST['submit'])) {
    $searchValue = $_POST['search'];
    $con = new mysqli("localhost", "d00234628", "123!@#qweQWE", "badminton_shop");
    if ($con->connect_error) {
        echo "connection Failed: " . $con->connect_error;
    } else {
        $sql = "SELECT * FROM records WHERE name  LIKE '%$searchValue%' OR price LIKE '%$searchValue%'";

        $result = $con->query($sql);
    }
}
?>
<?php
include('includes/header.php')
?>
<?php if ($result != null) { ?>
        <table class="table table-hover table-striped table-bordered">
            <tr class="text-center table-secondary">
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            <?php foreach ($result as $record) : ?>
                <tr class="text-center table-active">
                    <td><img src="image_uploads/<?php echo $record['image']; ?>" width="100px" height="100px" /></td>
                    <td class="fs-4 pt-4"><?php echo $record['name']; ?></td>
                    <td class="fs-4 pt-4">€ <?php echo $record['price']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php } ?>