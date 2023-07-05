<?php
    ob_flush();
	require('../../header.php');
    require('../../inc/db.config.php');	



    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE class_id=$id";
    $result = mysqli_query($conn, $sql);
?>

<main class="content">
            <div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Student</strong> Dashboard</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="<?=ADMINURL?>">EazySchool</a></li>
									<li class="breadcrumb-item"><a href="#">Students</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Students</li>
								</ol>
							</nav>
						</div>
					</div>
				<div class="container-fluid p-0">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <table class="table table-hover my-0">
                                <tr>
                                    <th class="d-none d-xl-table-cell">Student name</th>
                                    <th class="d-none d-xl-table-cell">Student Email</th>
                                    <th class="d-none d-xl-table-cell">Student Class</th>
                                    <th class="d-none d-xl-table-cell">Attendance</th>
                                </tr>


                                <?php if(mysqli_num_rows($result) > 0): ?>

                                    <?php foreach($result as $data): ?>

                                    <tr>
                                        <td class="d-none d-xl-table-cell"><?= $data['name']?></td>
                                        <td class="d-none d-xl-table-cell"><?= $data['email']?></td>
                                        <?php
                                            $class_id = $data['class_id'];
                                            $sql = "SELECT * FROM classes WHERE id=$class_id";
                                            $result = mysqli_query($conn, $sql);

                                            foreach($result as $class)

                                        ?>
                                        <td class="d-none d-xl-table-cell"><?= $class['name']?></td>
                                        <td class="d-none d-xl-table-cell"><a href="<?= ADMINURL.'/actions/attendance/attendance.php?id=' . $data['id']?>" class='btn btn-primary'>View Attendance</a></td>
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