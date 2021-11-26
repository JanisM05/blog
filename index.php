<?php 
$user = 'root';
$password = '';
$database = 'wordpress';

$pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

$stmt = $pdo->query('SELECT * FROM blog order by created_at desc');
$daten = $stmt->fetchAll();



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
    <link rel="stylesheet" href="css/style.css">
    <title>Homepage</title>
</head>
<body class = container>
    
    <div class = title>

    <h1>Blog von Janis</h1>
    <h2>Herzlich Willkommen</h2>

    </div>

        <ul class = nav>
            <a href = "index.php"><li>Alle Blogs</li></a>
            <a href = "newblog.php"><li >Blog erstellen</li></a>
        </ul>
        <?php foreach($daten as $data){ ?>

            <div class = blogs>

                <h3 class = blogtitle> <?= $data["post_title"] ?> </h3>
                <h3 class = name><?= $data["created_by"]?></h3>
                <p class = text><?= $data["post_text"]?></p>
                <img src = <?= $data["picture"]?> class = picture>
                <p class = date><?= $data["created_at"]?></p>
                

            </div>
            
            <br>

        <?php } ?>

    </div>


    <footer class = footer>

        <h2 class = otherblogs>Zu den anderen Blogs</h2>

        <?php foreach($otherblogs as $otherblog) { ?>

        <a href = <?= $otherblog["url"]?>><?= $otherblog["description"]?></a>

        <?php }?>

    </footer>
</body>
</html>