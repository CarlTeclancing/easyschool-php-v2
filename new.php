<?php 

    require('./student/inc/db.config.php');
    require('./student/inc/dir.php');


    $query = "SELECT * FROM classes";

     $results = mysqli_query($conn, $query);
                                    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student login</title>
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/app.css">
</head>
<body>
    <div class="container-main">

        <div class="row-1">
            <img src="./assets/img/EazySchool.png" alt="">
            <form action="./student/helpers/register.auth.php" method="POST">
                <div class="form-el">
                    <label for="name">Enter Full Name</label>
                    <div class="input">
                        <div class="icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <input type="text" name="name" placeholder="Enter your email....">
                    </div>
                    
                </div>


                <div class="form-el">
                    <label for="name">Enter Email</label>
                    <div class="input">
                        <div class="icon">
                            <i class="bi bi-envelope-at"></i>
                        </div>
                        <input type="text" name="email" placeholder="Enter your email....">
                    </div>
                    
                </div>

                <div class="form-el">
                    <label for="name">Enter Password</label>
                    <div class="input">
                        <div class="icon">
                            <i class="bi bi-key"></i>
                        </div>
                        <input type="password" name="password" placeholder="Enter your password....">
                    </div>
                    <div class="form-el">
                        
                            <label for="class">Sellect Class</label>
                            <select name="class" id="">
                                <?php foreach($results as $class) :?>
                                    <option value="<?=$class['id']?>"><?=$class['name']?></option>

                                <?php endforeach ?>
                            </select>
                        
                    </div>              
                    
                    <button type="submit" class='btn-p'>Register</button>
                    <span class="link">Already have an acount login here</span>
                    
                </div>
            </form>
        </div>
        <div class="row-2">
            <div class="img-hold">
                <img src="./assets/img/easyschool admin dashboard.jpg" class="admin-dash" alt="">
            </div>
            
        </div>
    </div>
</body>
</html>