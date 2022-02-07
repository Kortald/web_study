<?php 
	session_start();
    require_once("DataBase.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Авторизация</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<?php if($_SESSION['count_error_avtorisation']<3 || $_SESSION['count_error_avtorisation']==''){ ?>
<div class="container-fluid bg-white text-center" style="min-height:100vh;">
<div class="container" style="margin:0 auto">
<h1 style="color:blue;">Введите данные для авторизации</h1>
<form action="check_auth.php" method="post" style="margin:0 auto; padding-top:2vh; padding-bottom:4vh; max-width: 40vw; display: flex; flex-direction: column">
    <div class="form-group row" style="margin-bottom:5px;">
    <?php if($fl_error_email):?>
      <h5 style="color:red;">Ошибка логина<h5>
      <?php endif?>
            <h4 class="col-sm-3">Email</h4>
            <div class="col-sm-9">
                <input value="<?=htmlspecialchars($_POST['us_email'],ENT_QUOTES)?>" type="text" name="us_email" class="form-control" placeholder="email@example.com">
            </div>
    </div>
    <h5 style="color:blue;">Введите пароль</h5>
    <div class="form-group row" style="margin-bottom:5px;">
    <?php if($fl_error_password):?>
      <h5 style="color:red; padding-top:0;">Неверный пароль<h5>
    <?php endif?>
        <h4 class="col-sm-3">Password</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_pass'],ENT_QUOTES)?>" type="password" name="us_pass" class="form-control" placeholder="Password">
        </div>
    </div>
    <input type="submit" value="Войти" class="bth bth-primary" style="margin-top:20px;"></input>
    <div class="container" style="margin-top:1em; margin-bottom:0;">
    <a href="register.php" style="margin-bottom:0; padding:0 0 0 0;">Зарегестрироваться</a>
    </div>
</form>
</div>
</div>
<?php } 
  else {
    if((time()-$_SESSION['time_lock_error_avtorisation']) < 10) { ?>
        <div class='container-fluid text-center' style='position:absolute; top:+42vh;'>
          <h1 style='margin:0 auto; color:red;'>
            Повторите попытку через: <?=(int)((3600+$_SESSION['time_lock_error_avtorisation']-time())/60)?> : <?=(int)((3600+$_SESSION['time_lock_error_avtorisation']-time())%60)?><br>
          </h1>
        </div>
        <?php }
        else {
          $_SESSION=array();
        } } ?>
</html>