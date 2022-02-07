<?php
    session_start();
    require_once('DataBase.php');
    $fio="/[a-zA-Zа-яёА-ЯЁ ][^0-9]{1,120}/";
    $address="/[a-zA-Zа-яёА-ЯЁ 0-9]{1,120}/";
    $gender="/[a-zA-Zа-яА-Я ][^0-9]{1,20}/";
    $blood="/[0-9]{1,}/";
    $factor="/[a-zA-Zа-яА-Я ][^0-9]{1,30}/";
    $password='/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*?])[^а-яА-Я][a-zA-Z0-9!@#$%^&*?]{6,}/';

    $fios=array();
    $errors=array();
    $array_zapr=array();
    $_SESSION['$POST']=$_POST;

    if (filter_var($_POST['us_email'], FILTER_VALIDATE_EMAIL)=='') {
        $errors['email']="проверьте почту ";
    }
    else $array_zapr[]=$_POST['us_email'];

    if ((preg_match_all($password, $_POST['us_pass1'])==0) || (strcmp($_POST['us_pass1'],$_POST['us_pass2'])!=0)) {
        $errors['pass']="проверьте пароль ";
    }
    else $array_zapr[]=password_hash($_POST['us_pass1'], PASSWORD_BCRYPT);

    if (preg_match_all($fio, $_POST['us_fio'])==0) {
        $errors['fio']="проверьте ФИО ";
    }
    else $array_zapr[]=$_POST['us_fio'];
    
    $array_zapr[]=$_POST['us_date'];
    
    if (preg_match_all($address, $_POST['us_adress'])==0) {
        $errors['adress']="проверьте адрес ";
    }
    else $array_zapr[]=$_POST['us_adress'];
    
    if ($_POST['us_gender']==0) {
        $errors['gender']="Выберите пол ";
    }
    if ($_POST['us_gender']==1) {
        $array_zapr[]='Мужской';
    }

    if ($_POST['us_gender']==2) {
        $array_zapr[]='Женский';
    }
    
    $array_zapr[]=$_POST['us_interests'];
    
    if (filter_var($_POST['us_vk_link'], FILTER_VALIDATE_URL)=='') {
        $errors['vk_link']="проверьте профиль вк ";
    }
    else $array_zapr[]=$_POST['us_vk_link'];
    
    if (preg_match_all($blood, $_POST['us_blood'])==0) {
        $errors['blood']="проверьте группу крови ";
    }
    else $array_zapr[]=$_POST['us_blood'];
    
    if (preg_match_all($factor, $_POST['us_rezus'])==0) {
        $errors['rezus']="проверьте резус-фактор ";
    }
    else $array_zapr[]=$_POST['us_rezus'];

    if (count($errors)==0) {
        $fio_flag=1;
        $sth = $pdo1->prepare("SELECT fio12 FROM user");
        $sth->execute();
        $fios = $sth->fetchAll();
        foreach($fios as $tmp) {
            if ($_POST['us_fio']==$tmp['fio']) $fio_flag=0;
        }
        if ($fio_flag==1) {
            $sql="INSERT INTO user SET email=? , pass=?, fio12=?, date=?, adress=?, gender=?, interests=?, vk_link=?, blood=?, rezus=?";
            $query=$pdo1->prepare($sql);
            $query->execute($array_zapr);
            
            $sql="SELECT id,email FROM user WHERE email=?";
            $query=$pdo1->prepare($sql);
            $query->execute([$email]);
            $result=$query->fetch();
            $_SESSION['id']=$result['id'];
            header("Location:../index.php");
        }
        else {
            $errors['fio_double']='Пользователь с таким именем уже существует';
            $_SESSION['errors']=$errors;
            header("Location:../register.php");
        }
    }
    else {
        $_SESSION['errors']=$errors;
        header("Location:../register.php");
    }