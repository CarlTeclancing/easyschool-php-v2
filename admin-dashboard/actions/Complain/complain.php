<?php
    ob_flush();
	require('../../header.php');
    require('../../inc/db.config.php');	


    $id = $_GET['id'];

    $query = "SELECT * FROM complains WHERE id = $id";
    

    $result = mysqli_query($conn, $query);

?>
			<main class="content">
            <div class="row mb-2 mb-xl-3">
						<div class="col-auto   d-sm-block">
							<h3><strong>Complains</strong> Dashboard</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="<?=ADMINURL?>">EazySchool</a></li>
									<li class="breadcrumb-item"><a href="#">Complains</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Complains</li>
								</ol>
							</nav>
						</div>

				<div class="container-fluid p-0">
                    

                                <?php if(mysqli_num_rows($result) > 0): ?>

                                    <?php foreach($result as $data): ?>
                                        <div class="card m-5">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0"><?=$data['title']?></h5>
                                            </div>

                                            <div class="card-body">
                                                <?php 
                                                        $student_id = $data['student_id'];

                                                        $query = "SELECT * FROM studnets WHERE id = $student_id";
                                                        $result= mysqli_query($conn, $query);
                                                ?>

                                                <?php foreach($result as $student): ?>
                                                    <p class="card-text"><?=$student['name']?></p>
                                                <?php endforeach ?>
                                                <p class="card-text"><?=$data['desc']?></p>

                                                <?php 
                                                        $class_id = $data['class_id'];

                                                        $query = "SELECT * FROM classes WHERE id = $class_id";
                                                        $result= mysqli_query($conn, $query);
                                                ?>

                                                <?php foreach($result as $class): ?>
                                                    <p class="card-text"><?=$class['name']?></p>
                                                <?php endforeach ?>


                                                <?php 
                                                        $teacher_id = $data['teacher_id'];

                                                        $query = "SELECT * FROM teachers WHERE id = $teacher_id";
                                                        $result= mysqli_query($conn, $query);
                                                ?>

                                                <?php foreach($result as $teacher): ?>
                                                    <p class="card-text"><?=$teacher['name']?></p>
                                                <?php endforeach ?>
                                                <p class="card-text"><?=$data['desc']?></p>
                                                
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    

                                <?php endif ?>

                        
                    </div>
                </div>
            </main>
<?php

    require('../../footer.php');
	
?>