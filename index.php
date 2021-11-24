


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
    <h2>Herzlich Wilkommen</h2>

    </div>

    <ul class = nav>
        <a href = "index.php"><li>Alle Blogs</li></a>
        <a href = "newblog.php"><li >Blog erstellen</li></a>
    </ul>

    <div class = blogs>

    <?php foreach(){?>
        <h3 class = blogtitle>Titel</h3>
        <h3 class = name>Name</h3>
        <p class = text>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
        <p class = picture>Bild</p>


    </div>
</body>
</html>