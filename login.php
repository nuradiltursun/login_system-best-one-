<?php 
require('header.php');

?>


<div class="container">
    <div class="card mt-2">
        <div class="card-header">
            <h2 class="text-center">بۇ يەردىن كىرىڭ</h2>
        </div>
        <div class="card-body">
        <form action="includes/login.inc.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">ئىلخەت</label>
                    <input type="email" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>شىفىر</label>
                    <input type="password" name="password" class="form-control" >
                </div>
                
                <button type="submit" name="login-submit" class="btn btn-primary">كىرىش</button>
            </form>
        </div>
    </div>
</div>