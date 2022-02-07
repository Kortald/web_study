<?php
	session_start();
    require_once("DataBase.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Регистрация</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <?php
        $errors=$_SESSION['errors'];
    ?>
</head>
<div class="container-fluid bg-white text-center" style="min-height:100vh;">
<div class="container" style="margin:0 auto">
<h1 style="color:blue;">Введите данные для регистрации</h1>
<form action="check_reg.php" method="post" style="margin:0 auto; padding-top:2vh; padding-bottom:4vh; max-width: 40vw; display: flex; flex-direction: column">
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">Email</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_email'],ENT_QUOTES)?>" type="text" name="us_email" class="form-control" placeholder="email@example.com">
            <span style="color:red"><?php echo $errors['email'];?></span>
        </div>
    </div>
    <h5 style="color:blue;">Введите пароль</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">Password</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_pass1'],ENT_QUOTES)?>" type="password" name="us_pass1" class="form-control" placeholder="Password">
            <span style="color:red"><?php echo $errors['pass'];?></span>
        </div>
    </div>
    <h5 style="color:blue;">Повторите пароль</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">Password</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_pass2'],ENT_QUOTES)?>" type="password" name="us_pass2" class="form-control" placeholder="Password">
        </div>
    </div>
    <h5 style="color:blue;">Введите ФИО</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">Name</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_fio'],ENT_QUOTES)?>" type="text" name="us_fio" class="form-control" placeholder="Фамилия Имя Отчестсво">
            <span style="color:red"><?php echo $errors['fio'];?></span>
            <span style="color:red"><?php echo $errors['fio_double'];?></span>
        </div>
    </div>
    <h5 style="color:blue;">Введите дату рождения</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">Date of birth</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_date'],ENT_QUOTES)?>" type="text" name="us_date" class="form-control" placeholder="12.03.4567">
            <span style="color:red"><?php echo $errors['date'];?></span>
        </div>
    </div>
    <h5 style="color:blue;">Введите свой адресс</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">Adress</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_adress'],ENT_QUOTES)?>" type="text" name="us_adress" class="form-control" placeholder="Улица 1, строение 2, квартира 3">
            <span style="color:red"><?php echo $errors['adress'];?></span>
        </div>
    </div>
    <h5 style="color:blue;">Выберите свой пол</h5>
    <span style="color:red"><?php echo $errors['gender'];?></span>
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="us_gender" type="radio" id="inlineRadio2" value="1">
        <label class="form-check-label" for="inlineRadio2">Мужской</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="us_gender" type="radio" id="inlineRadio2" value="2">
        <label class="form-check-label" for="inlineRadio2">Женский</label>
    </div>
    <h5 style="color:blue;">Введите свои интересы</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">Interests</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_interests'],ENT_QUOTES)?>" type="text" name="us_interests" class="form-control" placeholder="Играю в футбол">
            <span style="color:red"><?php echo $errors['interests'];?></span>
        </div>
    </div>
    <h5 style="color:blue;">Введите свой VK профиль (ссылку)</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">VK</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_vk_link'],ENT_QUOTES)?>" type="text" name="us_vk_link" class="form-control" placeholder="http://www.vk.com/...">
            <span style="color:red"><?php echo $errors['vk_link'];?></span>
        </div>
    </div>
    <h5 style="color:blue;">Введите вашу группу крови</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">Blood bumber</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_blood'],ENT_QUOTES)?>" type="text" name="us_blood" class="form-control" placeholder="2">
            <span style="color:red"><?php echo $errors['blood'];?></span>
        </div>
    </div>
    <h5 style="color:blue;">Введите ваш резус-фактор</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 class="col-sm-3">Rhesus factor </h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_rezus'],ENT_QUOTES)?>" type="text" name="us_rezus" class="form-control" placeholder="Положительная">
            <span style="color:red"><?php echo $errors['rezus'];?></span>
        </div>
    </div>
    <div class="colum">
        <button type="sumbit" value="Зарегестрироваться" class="btn btn-primary" style="margin-top: 20px">Зарегестрироваться</input>
    </div>
    <div class="container" style="margin-top:1em; margin-bottom:0;">
    <a href="authorization.php" style="margin-bottom:0; padding:0 0 0 0;">Авторизоваться</a>
    </div>
</form>
</div>
</div>
</html>