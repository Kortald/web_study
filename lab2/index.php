<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lab2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="Styles.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body class="containter-fluid">
<head>
    <?php
    include("MEDsiCenter.php");
    include("DataBase.php");
    ?>
</head>

<div class="filtr">
    <?php if(count($rez)>0):?>
<table class="table" style="margin-top:2em">
    <thead>
    <tr>
        <th scope="col">Скан листа</th>
        <th scope="col">Имя пациента</th>
        <th scope="col">Лечащий врач</th>
        <th scope="col">Диагноз</th>
        <th scope="col">Продолжительность болезни(в днях)</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach($rez as $item){?>
    <tr>
        <th scope="row"><img src="inc/Tab_imgs/<?=$item['ListScan']?>" style="height: 150px;width: 150px;"></th>
        <td><?=$item['name']?></td>
        <td><?=$item['fio']?></td>
        <td><?=$item['Diagnosis']?></td>
        <td><?=$item['IllnessDuration']?></td>
    </tr>
    <?php };?>

    </tbody>
    </table>
    <?php endif;?>
</div>
</body>
</html>
