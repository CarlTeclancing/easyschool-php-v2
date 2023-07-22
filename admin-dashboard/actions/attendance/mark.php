<?php
ob_flush();
require('../../header.php');
require('../../inc/db.config.php');


$class_id = $_GET['id'];

$query = "SELECT * FROM students WHERE class_id = $class_id && is_visible =1";

$result = mysqli_query($conn, $query);


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($result as $data):

    $student_id = $data['id'];

    $sql = "SELECT * FROM teachers WHERE class_id = $class_id && is_visible =1";

    $count = mysqli_query($conn, $sql);
    foreach($count as $teacher){
        $teacher_id = $teacher['id'];
    }
    
    $class_id;
    $data = $_POST['date'];
    if(!isset($_POST['status'])){
        $status = 0;
    }else{
        $status = 1;
    }

    
    $stmt = $conn->prepare("INSERT INTO attendance (`student_id`, `teacher_id`, `class_id`, `date`, `status`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiisi", $student_id, $teacher_id, $class_id, $data, $status);

if ($stmt->execute()) {

    $rest =1;
}
endforeach;

if($rest >=1 ){
    echo "Attendance succesfully Sibmited";
}else{
    echo "failed to Submit attendance";
}
}

?>

<main class="content">
            <div class="row mb-2 mb-xl-3">
						<div class="col-auto   d-sm-block">
							<h3><strong>Attendance</strong> Dashboard</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="<?=ADMINURL?>">EazySchool</a></li>
									<li class="breadcrumb-item"><a href="#">Complains</a></li>
									<li class="breadcrumb-item active" aria-current="page">Mark Attendance</li>
								</ol>
							</nav>
						</div>

                        <div class="container-fluid p-0">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <table class="table table-hover my-0">
                                <tr>
                                    <th class="  d-xl-table-cell">Student name</th>
                                    <th class="  d-xl-table-cell">Student Email</th>
                                    <th class="  d-xl-table-cell">Student Class</th>
                                    <th class="  d-xl-table-cell">Attendance Status</th>
                                </tr>


                                

                                    

                                    <tr>
                                        <?php foreach($result as $data): ?>
                                        <td class="  d-xl-table-cell"><?= $data['name']?></td>
                                        <td class="  d-xl-table-cell"><?= $data['email']?></td>
                                        <?php
                                            $class_id = $data['class_id'];
                                            $sql = "SELECT * FROM classes WHERE id=$class_id && is_visible =1";
                                            $result = mysqli_query($conn, $sql);

                                            foreach($result as $class)

                                        ?>
                                        <td class="  d-xl-table-cell"><?= $class['name']?></td>

                                        <td class="  d-xl-table-cell">
                                            <form action=""method="POST">
                                                <input type="checkbox" name="status" id="" style="width: 40px; height:40px;">
                                        </td>
                                    </tr>

                                    <?php endforeach ?>
                                    

                                

                            </table>
                            <div class="form-elements">
                                <label for="date" class="form-label mt-5">Attendance Date</label>
                                <input type="date" name="date" id="" style="margin-left:16px;">
                            </div>
                            
                            <input type="submit" class="btn btn-primary mt-4" value="Submit Attendance">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</main>
<?php

require('../../footer.php');

?>