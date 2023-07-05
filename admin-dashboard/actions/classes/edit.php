<?php
ob_start();
require('../../header.php');
require('../../inc/db.config.php');

$id = $_GET['id'];

// Get the current data for the entry from the database
$sql = "SELECT * FROM classes WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {

    // Get the data from the form
    $name = $_POST['name'];
    $desc = $_POST['desc'];

    // Update the entry in the database
    $sql = "UPDATE classes SET name=?, `desc`=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $name, $desc, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Update successful
        echo "Update successful!";
    } else {
        // Update failed
        echo "Update failed!";
    }

    mysqli_stmt_close($stmt);
}

?>
<main class="content">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($data = mysqli_fetch_assoc($result)): ?>
                            <div class="form-elements">
                                <label for="name" class="form-label mt-5">Class Name</label><br />
                                <input type="text" name="name" class="form-control" value="<?= $data['name'] ?>" id="">
                            </div>
                            <div class="form-elements">
                                <label for="desc" class="form-label mt-5">Class Description</label><br />
                                <textarea name="desc" class="form-control" rows="4"><?= $data['desc'] ?></textarea>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <input type="submit" value="Update Class" class="btn btn-primary mt-5" name="submit">
                </form>
            </div>
        </div>
    </div>
</main>

<?php
require('../../footer.php');
ob_flush();
?>
