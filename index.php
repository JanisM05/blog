<?php 

$user = 'root';
$password = '';
$database = 'wordpress';

/*
if (isset($_POST["blog-id"])) {
    echo ($_POST["blog-id"]);
}
*/

$comment = htmlspecialchars($_POST["comment"] ?? '');

if (isset($_POST["blog-id-comments"])) {
    $commentid = $_POST["ID"] ?? '';
}
$commentid = $_POST["ID"] ?? '';


if (isset($_POST["blog-id-comments"])) {
    $ID_comments = $_POST["blog-id-comments"];
}

if(isset($_POST['absenden']) && $_POST['absenden'] == 'absenden') {
    $dbConnectionComments = new PDO('mysql:host=localhost;dbname=wordpress', 'root', '');
    $stmt = $dbConnectionComments->prepare('INSERT INTO comments (comment, ID) 
    VALUES (:comment, :ID)');


    $stmt->execute([':comment' => $comment, ':ID' => $ID_comments]);
}

if (isset($_POST["blog-id"])) {
    $ID = $_POST["blog-id"];
}

if(isset($_POST['Liken']) && $_POST['Liken'] == 'Liken') {


    $dbConnection = new PDO('mysql:host=localhost;dbname=wordpress', 'root', '');
    $stmt = $dbConnection->prepare("UPDATE blog Set likes = likes + 1 WHERE ID = $ID");


    $stmt->execute();
}

$pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);





$pdo2 = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dagomez', 'd041e_dagomez', '54321_Db!!!', [
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
      
$stmt = $pdo2->query('SELECT url, description FROM urls order by description asc');
$otherblogs = $stmt->fetchAll();


$stmt = $pdo->query('SELECT * FROM blog order by created_at desc');
$daten = $stmt->fetchAll();

$stmt = $pdo->query('SELECT * FROM comments');
$comments = $stmt->fetchAll();

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
    <div class = main>

        <div class = nav>
            <a class = "navelement" href = "index.php"><li>Alle Blogs</li></a>
            <a class = "navelement" href = "newblog.php"><li >Beitrag erstellen</li></a>
            <a class = "navelement"href = "otherblogs.php"><li >Zu den anderen Blogs</li></a>
</div>
        <div class="blog-list">
        <?php foreach($daten as $data){ ?>

            <div class = blog>        
                <h2 class = blogtitle><?= $data["post_title"] ?> </h2>
                <h2 class = name><?= $data["created_by"]?></h2>
                <h3 class = text><?= $data["post_text"]?></h3>

                <?php if ($data["picture"] !== ""){?>
                <img src = <?= $data["picture"]?> class = "picture">
                <?php }?>
                
                <h3 class = date><?= $data["created_at"]?></h3>

                <h2 class = likes>Likes: <?= $data["likes"]?></h2>
                
                <form class = "enter" action="index.php" Method = 'POST'>
                    <input class = like type="submit" name="Liken" value="Liken" />
                    <input name="blog-id" type="hidden" value="<?= $data["ID"] ?>" />
                </form>


                <form class = "formular"  action="index.php" method = "POST">
                        <label class = "label" for = "commenttitle">Kommentare</label><br>
                        <textarea name="comment" id="comment" rows="5"></textarea><br>
                        <input class = send_comment type="submit" name="absenden" value="absenden" />
                        <input name="blog-id-comments" type="hidden" id = "ID" value="<?= $data["ID"] ?>" />
                </form>
                
                <div class = comments>
                <?php foreach ($comments as $comment) {
                    if ($comment['ID'] === $data['ID']){
                        if ($comment['comment'] !== "") {
                    ?>
                
                    <p><?= $comment['comment'] ?></p>

                <?php }
                }
                }?>
                </div>
            </div>
            <p class = line></p>
            <br>

        <?php } ?>
        
        </div> 

    </div>
</body>
</html>