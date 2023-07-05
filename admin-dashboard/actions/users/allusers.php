<?php
ob_flush();
require('../../header.php');
require('../../inc/db.config.php');




?>
<main class="content">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Users</strong> Dashboard</h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="<?= ADMINURL ?>">EazySchool</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Users</li>
                </ol>
            </nav>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <a href="<?= ADMINURL . "/actions/users/.php" ?>" class="btn btn-primary">All Users</a>
            <a href="<?= ADMINURL . "/actions/users/students.php" ?>" class="btn btn-outline-primary">Students</a>
            <a href="<?= ADMINURL . "/actions/users/teachers.php" ?>" class="btn btn-outline-primary">Teachers</a>
        </div>
    </div>

    <div class="container-fluid p-0">
        <span>This is under development</span>
    </div>

</main>
<?php

require('../../footer.php');

?>