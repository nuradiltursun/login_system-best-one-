<?php 
require('header.php');

?>


<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h2 class="text-center">بۇ يەردىن تىزىملىتىڭ</h2>
        </div>
        <div class="card-body">
        <form action="includes/sign.inc.php"  method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">ئىسىم</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ئىلخەت</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>شىفىر</label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <div class="form-group">
                    <label>شىفىر قايتىلىش</label>
                    <input type="password" name="password-repeat" class="form-control" >
                </div>
                
                <button type="submit" name="sign-submit" class="btn btn-primary">تىزىملىتىش</button>
            </form>
        </div>
    </div>
</div>
