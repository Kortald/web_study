<?php
	session_start();
    require_once("DataBase.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
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
<div class="container-fluid bg-white text-center" style="background-image: url(inc/images/reg.png);min-height:100vh;">
<div class="container" style="margin:0 auto">
<h1 style="color:cyan;">Зарегистрируйтесь</h1>
<form action="check_reg.php" method="post" style="margin:0 auto; padding-top:2vh; padding-bottom:4vh; max-width: 40vw; display: flex; flex-direction: column">
    <div class="form-group row" style="margin-bottom:5px;">
        <h5 style="color:cyan;">Введите почту</h5>
        <h4 style="color:cyan;" class="col-sm-3">Почта</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_email'],ENT_QUOTES)?>" style="width:70%" type="text" name="us_email" class="form-control" placeholder="your@e-mail.dom">
            <span style="color:red"><?php echo $errors['email'];?></span>
        </div>
    </div>
    <h5 style="color:cyan;">Введите пароль</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 style="color:cyan;" class="col-sm-3">Пароль</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_pass1'],ENT_QUOTES)?>"  style="width:70%" type="password" name="us_pass1" class="form-control" placeholder="secretword">
            <span style="color:red"><?php echo $errors['pass'];?></span>
        </div>
    </div>
    <h5 style="color:cyan;">Повторите пароль</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 style="color:cyan;" class="col-sm-3">Пароль</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_pass2'],ENT_QUOTES)?>" style="width:70%" type="password" name="us_pass2" class="form-control" placeholder="again">
        </div>
    </div>
    <h5 style="color:cyan;">Введите ФИО</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 style="color:cyan;" class="col-sm-3">Имя</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_fio'],ENT_QUOTES)?>" style="width:70%" type="text" name="us_fio" class="form-control" placeholder="Иванов Иван Иванович">
            <span style="color:red"><?php echo $errors['fio'];?></span>
            <span style="color:red"><?php echo $errors['fio_double'];?></span>
        </div>
    </div>
    <h5 style="color:cyan;">Введите дату рождения</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 style="color:cyan;" class="col-sm-3">Дата рождения</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_date'],ENT_QUOTES)?>" style="width:70%" type="text" name="us_date" class="form-control" placeholder="дд.мм.гггг">
            <span style="color:red"><?php echo $errors['date'];?></span>
        </div>
    </div>
    <h5 style="color:cyan;">Введите свой адресс</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 style="color:cyan;" class="col-sm-3">Адрес</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_adress'],ENT_QUOTES)?>" type="text" style="width:70%"  name="us_adress" class="form-control" placeholder="д.ул.кв.">
            <span style="color:red"><?php echo $errors['adress'];?></span>
        </div>
    </div>
    <h5 style="color:cyan;">Выберите свой пол</h5>
    <span style="color:red"><?php echo $errors['gender'];?></span>
    <div class="form-check form-check-inline" style="margin-left:25%">
        <input class="form-check-input" name="us_gender" type="radio" id="inlineRadio2" value="1">
        <label style="color:cyan; margin-right:60%" class="form-check-label" for="inlineRadio2">Мужской</label>
    </div>
    <div class="form-check form-check-inline" style="margin-left:25%">
        <input class="form-check-input" name="us_gender" type="radio" id="inlineRadio2" value="2">
        <label style="color:cyan; margin-right:60%" class="form-check-label" for="inlineRadio2">Женский</label>
    </div>
    <h5 style="color:cyan;">Введите свои интересы</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 style="color:cyan;" class="col-sm-3">Интересы</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_interests'],ENT_QUOTES)?>" style="width:70%" type="text" name="us_interests" class="form-control" placeholder="Интересы">
            <span style="color:red"><?php echo $errors['interests'];?></span>
        </div>
    </div>
    <h5 style="color:cyan;">Ссылка на VK</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 style="color:cyan;" class="col-sm-3">VK</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_vk_link'],ENT_QUOTES)?>" style="width:70%;" type="text" name="us_vk_link" class="form-control" placeholder="http://www.vk.com/...">
            <span style="color:red"><?php echo $errors['vk_link'];?></span>
        </div>
    </div>
    <h5 style="color:cyan;">Введите вашу группу крови</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 style="color:cyan;" class="col-sm-3">Группа крови</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_blood'],ENT_QUOTES)?>" style="width:70%" type="text" name="us_blood" class="form-control" placeholder="На рукаве">
            <span style="color:red"><?php echo $errors['blood'];?></span>
        </div>
    </div>
    <h5 style="color:cyan;">Введите ваш резус-фактор</h5>
    <div class="form-group row" style="margin-bottom:5px;">
        <h4 style="color:cyan;" class="col-sm-3">Резус-Фактор</h4>
        <div class="col-sm-9">
            <input value="<?=htmlspecialchars($_POST['us_rezus'],ENT_QUOTES)?>" style="width:70%" type="text" name="us_rezus" class="form-control" placeholder="Положительная">
            <span style="color:red"><?php echo $errors['rezus'];?></span>
        </div>
    </div>
    <div class="colum">
        <button type="sumbit" value="Зарегестрироваться" class="btn btn-info" style="margin-top: 20px;">Зарегистрироваться</input>
    </div>
    <div class="flexbox" style="display:column;margin-top:1em; margin-bottom:0;">
    <a href="login.php" style="margin-bottom:0; color:cyan; padding:0 0 0 0;">Авторизоваться</a><br>
    <a href="index.php" style="margin-bottom:0; color:cyan; padding:0 0 0 0;">На главную</a>
    </div>
</form>
</div>
</div>
</html>