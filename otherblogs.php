<?php 
$pdo2 = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dagomez', 'd041e_dagomez', '54321_Db!!!', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
          
    $stmt = $pdo2->query('SELECT url, description FROM urls order by description asc');
    $otherblogs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/otherblogs.css">
    <title>other Blogs</title>
</head>
<body class = container>
    <div class = title>
        <h1>Blog von Janis</h1>
        <h2>Andere Blogs</h2>
    </div>

    <div class = nav>
        <a class = "navelement" href = "index.php"><li>Alle Blogs</li></a>
        <a class = "navelement" href = "newblog.php"><li >Beitrag erstellen</li></a>
        <a class = "navelement" href = "otherblogs.php"><li >Zu den anderen Blogs</li></a>
</div>

    <div class = blogs>
    <?php foreach($otherblogs as $otherblog) { ?>

    <a target = "blank" class = "otherblogs" href = <?= $otherblog["url"]?>><?= $otherblog["description"]?></a>
<?php }?>
    </div>
</body>
</html>
