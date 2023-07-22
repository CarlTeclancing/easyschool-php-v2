<?php
ob_flush();
require('../../header.php');
require('../../inc/db.config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM attendance WHERE student_id=$id";

$result = mysqli_query($conn, $sql);


?>

<main class="content">
<div class="row mb-2 mb-xl-3">
						<div class="col-auto   d-sm-block">
							<h3><strong>Attendance</strong> Student Attendance</h3>
						</div>

				<div class="container-fluid p-0">
                    <div class="card flex-fill">
                        <div class="card-header table-responsive">
                            <table class="table table-hover my-0">
                                <tr>
                                    <th class="  d-xl-table-cell">Student name</th>
                                    <th class="  d-xl-table-cell">Class</th>
                                    <th class="  d-xl-table-cell">Teacher</th>
                                    <th class="  d-xl-table-cell">Date</th>
                                    <th class='  d-xl-table-cell'>Attendance Status</th>
                                </tr>


                                <?php if(mysqli_num_rows($result) > 0): ?>

                                    <?php foreach($result as $data): ?>

                                        <?php
                                            $student_id = $data['student_id'];
                                            $sql = "SELECT * FROM students WHERE id=$student_id && is_visible =1";
                                            $result = mysqli_query($conn, $sql);

                                            foreach($result as $students)

                                        ?>

                                    <tr>
                                        <td class="  d-xl-table-cell"><?= $students['name']?></td>
                                        
                                        <?php
                                            $class_id = $data['class_id'];
                                            $sql = "SELECT * FROM classes WHERE id=$class_id && is_visible = 1";
                                            $result = mysqli_query($conn, $sql);

                                            foreach($result as $class)

                                        ?>
                                        <td class="  d-xl-table-cell"><?= $class['name']?></td>

                                        <?php
                                            $teacher_id = $data['teacher_id'];
                                            $sql = "SELECT * FROM teachers WHERE id=$teacher_id && is_visible=1";
                                            $result = mysqli_query($conn, $sql);

                                            foreach($result as $results)

                                        ?>
                                        <td class="  d-xl-table-cell"><?= $results['name']?></td>

                                        <td class="  d-xl-table-cell"><?= $data['date']?></td>

                                        <?php if($data['status'] = 0): ?>

                                            <td class="  d-xl-table-cell"><span>Absent</span></td>

                                            <?php endif ?>

                                            <?php if($data['status'] = 1): ?>

                                                <td class="  d-xl-table-cell"><span>Present</span></td>

                                                

                                            <?php endif ?>

                                        

                                    </tr>

                                    <?php endforeach ?>
                                    

                                <?php endif ?>

                            </table>
                        </div>
                    </div>
                </div>
            </main>


<?php

require('../../footer.php');

?>