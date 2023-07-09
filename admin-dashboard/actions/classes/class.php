<?php
    ob_flush();
	require('../../header.php');
    require('../../inc/db.config.php');	



    $query = "SELECT * FROM classes WHERE is_visible=1";

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
									<li class="breadcrumb-item"><a href="#">Classes</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Classes</li>
								</ol>
							</nav>
						</div>
					</div>
				<div class="container-fluid p-0">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <table class="table table-hover my-0">
                                <tr>
                                    <th class="  d-xl-table-cell">class name</th>
                                    <th class="  d-xl-table-cell">class Description</th>
                                    <th class="  d-xl-table-cell">Action</th>
                                </tr>


                                <?php if(mysqli_num_rows($result) > 0): ?>

                                    <?php foreach($result as $data): ?>

                                    <tr>
                                        <td class="  d-xl-table-cell"><?= $data['name']?></td>
                                        <td class="  d-xl-table-cell"><?= $data['desc']?></td>
                                        <td class="  d-xl-table-cell"><a href="<?=ADMINURL.'/actions/classes/edit.php?id='.$data['id']?>" class='btn btn-primary'>Edit</a></td>
                                        <td class="  d-xl-table-cell"><a href="<?=ADMINURL.'/actions/classes/delete.php?id='.$data['id']?>" class='btn btn-danger'>Delete</a></td>
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