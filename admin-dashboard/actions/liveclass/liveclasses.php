<?php
    ob_flush();
	require('../../header.php');
    require('../../inc/db.config.php');	



    $query = "SELECT * FROM live_classes";

    $result = mysqli_query($conn, $query);

?>
			<main class="content">

            <div class="row mb-2 mb-xl-3">
						<div class="col-auto   d-sm-block">
							<h3><strong>Classes</strong> Dashboard</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="<?=ADMINURL?>">EazySchool</a></li>
									<li class="breadcrumb-item"><a href="#">Live Classes</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Live Classes</li>
								</ol>
							</nav>
						</div>
					</div>
				<div class="container-fluid p-0">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <table class="table table-hover my-0">
                                <tr>
                                    <th class=" d-xl-table-cell">class Title</th>
                                    <th class=" d-xl-table-cell">class Description</th>
                                    <th class=" d-xl-table-cell">Class method</th>
                                    <th class=" d-xl-table-cell">Start Time</th>
                                    <th class=" d-xl-table-cell">End Time</th>
                                    <th class=" d-xl-table-cell">class</th>
                                    <th class=" d-xl-table-cell">Teacher</th>
                                    <th class=" d-xl-table-cell">Action</th>

                                </tr>


                                <?php if(mysqli_num_rows($result) > 0): ?>

                                    <?php foreach($result as $data): ?>

                                    <tr>
                                        <td class=" d-xl-table-cell"><?= $data['title']?></td>
                                        <td class=" d-xl-table-cell"><?= $data['desc']?></td>
                                        <?php 
                                            $m_id =$data['live_class_method_id'];
                                            $query = "SELECT * FROM live_class_methods WHERE id=$m_id" ; 
                                            $result = mysqli_query($conn, $query);
                                        ?>
                                        <?php if(mysqli_num_rows($result) > 0): ?>

                                            <?php foreach ($result as $class_method) : ?>
                                                <td class=" d-xl-table-cell"><?= $class_method['name']?></td>
                                            <?php endforeach ?>

                                        <?php endif ?>
                                        <td class=" d-xl-table-cell"><?= $data['start_time']?></td>
                                        <td class=" d-xl-table-cell"><?= $data['end_time']?></td>
                                        <?php
                                            $id = $data['class_id'];
                                            $query = "SELECT * FROM classes WHERE id=$id" ; 
                                            $result = mysqli_query($conn, $query);
                                        ?>

                                            <?php if(mysqli_num_rows($result) > 0): ?>
                                        
                                       
                                            <?php foreach ($result as $class) : ?>
                                                <td class=" d-xl-table-cell"><?= $class['name']?></td>
                                            <?php endforeach ?>

                                        <?php endif ?>


                                        <?php
                                            $id = $data['creator_id'];
                                            $query = "SELECT * FROM teachers WHERE id=$id" ; 
                                            $result = mysqli_query($conn, $query);
                                        ?>

                                            <?php if(mysqli_num_rows($result) > 0): ?>
                                        
                                        
                                            <?php foreach ($result as $teachers) : ?>
                                                <td class=" d-xl-table-cell"><?= $teachers['name']?></td>
                                            <?php endforeach ?>

                                        <?php endif ?>
                                        <td class=" d-xl-table-cell"><a href="<?= $data['url']?>" target="_blank" class="btn btn-outline-primary" >Join Class</a></td>
                                        
                                        

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