<?php 

session_start();

?>
    <?php require('header.php');  ?>

   
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h4 class="card-title text-primary">
                <?php 
                    if(isset($_SESSION["username"])){
                            echo 'كىرىپ بولدىڭىز';
                        }else{
                            echo 'سىز تېخى كىرمىدىڭىز';
                        }
                ?>
                </h4>
                <div class="card-body">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus, beatae illo rerum eligendi odio obcaecati neque ad. Maiores molestiae doloribus earum eaque ipsam dignissimos atque deserunt aperiam dolore, quae amet.</p>
                </div>
            </div>
        </div>
       
    </div>
    
</body>
</html>