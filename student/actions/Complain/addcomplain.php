<?php
ob_flush();
require('../../header.php');
require('../../inc/db.config.php');

$class_id = $_SESSION['class_id'];


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_SESSION['id'];
    $teacher_id = $_POST['teacher_id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $stmt = $conn->prepare("INSERT INTO complains (`student_id`, `teacher_id`, `class_id`, `title`, `desc`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiss", $id, $teacher_id, $class_id, $title, $desc);

    if ($stmt->execute()) {

        echo "complain created succesfully";
    } else {
        echo "failed to submit complain";
    }
}
?>
<main class="content">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto   d-sm-block">
            <h3><strong>Complain</strong> Dashboard</h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="<?= STUDENTURL ?>">EazySchool</a></li>
                    <li class="breadcrumb-item"><a href="#">Complain</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Submit complain</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="card flex-fill">
            <form action="" method="POST" class="p-5 m-5">
                <div class="form-elements">
                    <label for="title" class="form-label mt-5">Title</label><br />
                    <input type="text" name="title" class="form-control" id="">
                </div>
                <div class="form-elements">
                    <label for="class" class="form-label mt-5">Chose Teacher</label>
                    <select name="teacher_id" id="">

                        <?php $query = "SELECT * FROM teachers WHERE class_id = $class_id";
                        $result = mysqli_query($conn, $query);
                        ?>
                        <?php if (mysqli_num_rows($result) > 0) : ?>

                            <?php foreach ($result as $data) : ?>
                                <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                            <?php endforeach ?>

                        <?php endif ?>

                    </select>
                </div>

                <div class="form-elements">
                    <label for="desc" class="form-label mt-5">Complain Details</label><br />
                    <textarea name="desc" id="" cols="30" rows="10"></textarea>
                </div>

                <input type="submit" name="submit" value="Submit complain" class="btn btn-primary mt-5">
            </form>
        </div>
    </div>

   

</main>



<?php

require('../../footer.php');

?>