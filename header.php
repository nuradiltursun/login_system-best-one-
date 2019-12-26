<link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./user.css">


<div class="container-fluid bg-dark">
    <div class="container d-flex justify-content-lg-between">
        <ul class="nav">
            <li class="nav-item"><a href="index.php" class="nav-link text-white">باش بەت</a></li>
        </ul>
        <ul class="nav d-flex flex-row-reverse ">
            <?php 
            if(isset($_SESSION["username"])){
              echo '
              <li class="nav-item">
                <a class="nav-link" href="includes/logout.inc.php">چىكىنىش</a>
              </li>
              ';
            }else{
                echo '<li class="nav-item">
                <a class="nav-link text-white" href="sign.php">تىزىملىتىش</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="login.php">كىرىش</a>
              </li>';
            }
            ?>
        </ul>

    </div>
</div>

