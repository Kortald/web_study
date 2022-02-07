<?php
$db_driver='mysql';
$db_user='root';
$db_pass='root';
$db_name='medci';
$db_server='localhost';
//создали pdo подключение
$connect="$db_driver:host=$db_server;dbname=$db_name";//создали подключение к нашей базе
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo=new PDO($connect, $db_user, $db_pass, $opt);
$db_driver='mysql';
$db_user='root';
$db_pass='root';
$db_name='users';
$db_server='localhost';
//создали pdo подключение
$connect="$db_driver:host=$db_server;dbname=$db_name";//создали подключение к нашей базе
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo1=new PDO($connect, $db_user, $db_pass, $opt);
$doctors=array();
$sicklists=array();
$sqlname="SELECT name FROM sicklists";
$query=$pdo->query($sqlname);
while($tmp=$query->fetch())
{
    $sicklists[]=$tmp;
}
$sqlfio="SELECT fio FROM doctors";
$query=$pdo->query($sqlfio);
while($tmp=$query->fetch())
{
    $doctors[]=$tmp;
}
$rez=array();
$array_zapr=array();

$fl=0;
foreach($_POST as $item) {//проверяем пуст ли массив
    if ($item!='') $fl=1;
}
if($fl==1) {//если не пуст

    $sql="SELECT * FROM sicklists INNER JOIN doctors ON DocID=ID WHERE id>0";
    if($_POST['name']) {
        $sql.=" AND name=? ";
        $array_zapr[]=$_POST['name'];
    }
    if($_POST['fio']) {
        $sql.=" AND doctors.fio=? ";
        $array_zapr[]=$_POST['fio'];
    }

    $query=$pdo->prepare($sql);
    $query->execute($array_zapr);
    while($tmp=$query->fetch())
    {
        $rez[]=$tmp;
    }
}
else//если пуст
{
    // $sql="SELECT tab.* , teacherid.id, teacherid.fio  FROM tableica tab INNER JOIN teacherid  ON tab.teacher=teacherid.id  ";
    $sql="SELECT * FROM sicklists INNER JOIN doctors ON DocID=ID";
    $query=$pdo->query($sql);
    while($tmp=$query->fetch())
    {
        $rez[]=$tmp;
    }
}

