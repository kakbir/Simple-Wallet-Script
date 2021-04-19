<?php

// DB credentials.
define('DB_HOST1','localhost');
define('DB_USER1','root');
define('DB_PASS1','');
define('DB_NAME1','web');
// Establish database connection.
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST1.";dbname=".DB_NAME1,DB_USER1, DB_PASS1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' "));
}
catch (PDOException $e )
{
exit("Error: " . $e->getMessage());
}

        
if(isset($_POST['submit12']))
{



$tutar=$_POST['tutar'];
$islem=$_POST['islem'];
$tur=$_POST['tur1'];


    
    
$sql ="INSERT INTO web(tutar,islem,tur) VALUES( :tutar, :islem,:tur)";
$query= $dbh -> prepare($sql);

$query-> bindParam(':tutar', $tutar, PDO::PARAM_STR);
$query-> bindParam(':islem', $islem, PDO::PARAM_STR);
$query-> bindParam(':tur', $tur, PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script type='text/javascript'> document.location = 'hesap.php'; </script>";
}
else 
{
$error="Hata";
}

}
?>