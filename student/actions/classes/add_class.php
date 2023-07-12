<?php
ob_flush();
require('../../header.php');
require('../../inc/db.config.php');
?>
<main class="content">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-elements">
                        <label for="name" class="form-label mt-5">Class Name</label><br />
                        <input type="text" name="name" class="form-control" id="">
                    </div>

                    <div class="form-elements">
                        <label for="name" class="form-label mt-5">Class Description</label><br />
                        <textarea name="desc" class="form-control" rows="4"></textarea>
                    </div>

                    <input type="submit" value="Create Class" class="btn btn-primary mt-5">
                </form>
            </div>
        </div>
    </div>
</main>
<?php
echo '<main class="content">';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (!empty($_POST['name']) && !empty($_POST['desc'])) {

        $query = 'INSERT INTO classes (`name`, `desc`) VALUES(?,?);';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $_POST['name'], $_POST['desc']);
        $execute = $stmt->execute();

        if ($execute) {
            $_SESSION['class_created'] = "Class Has Been Created";
        }
    }
    // echo '<main class="content">';
    // echo $name . $class_description;
    // echo '</main>';



}
echo '</main>';


require('../../footer.php');

?>