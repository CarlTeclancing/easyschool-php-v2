<?php
ob_flush();
require('../../header.php');
require('../../inc/db.config.php');


$id = $_GET['id'];

$query = "SELECT * FROM complains WHERE id = $id";

$result = mysqli_query($conn, $query);

foreach($result as $data):

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $complain_id = $id;
    $desc = $_POST['desc'];

    $stmt = $conn->prepare("INSERT INTO complain_respond (`comp_respond`, `complains_id`) VALUES (?, ?)");
    $stmt->bind_param("si", $desc,  $complain_id);

    if ($stmt->execute()) {

        echo "Reply succesfully";
    } else {
        echo "failed to reply complain";
    }

}

?>
<main class="content">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto   d-sm-block">
            <h3><strong>Complains</strong> Dashboard</h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="<?= ADMINURL ?>">EazySchool</a></li>
                    <li class="breadcrumb-item"><a href="#">Complains</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reply Complain</li>
                </ol>
            </nav>
        </div>
        <div class="card flex-fill">
        <div class="container-fluid p-0">
        <form action="" method="POST" class="p-5">
                <div class="form-elements">
                    <label for="title" class="form-label mt-5">Complain Title</label><br />
                    <input type="text" name="title" class="form-control" value="<?=$data['title']?>" id="">
                </div>

                <div class="form-elements">
                    <label for="desc" class="form-label mt-5">Complain Respond</label><br />
                    <textarea name="desc" id="" cols="30" rows="10"></textarea>
                </div>

                <input type="submit" name="submit" value="Reply" class="btn btn-primary mt-5">
            </form>
        </div>
        </div>
    </div>
</main>




<?php
endforeach;

require('../../footer.php');

?>