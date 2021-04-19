

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?=isset($title) ? $title . ' - ' : ''?>MarqeurZoom</title>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <nav class="main-header-nav">
                <ul class="nav-list">
                    <li class="list-item"><a class="item-link" href="index.php">Accueil</a></li>
                    <?php 
                        if (!empty($_SESSION['id'])){
                            ?>
                            <li class="list-item"><a class="item-link" href="index.php?controller=user&task=deconnexion">Deconnexion</a></li>
                            <li class="list-item"><a class="item-link" href="index.php?controller=lesson&task=show">Lecon</a></li>
                            <?php
                        }
                        else {
                            ?>
                            <li class="list-item"><a class="item-link" href="index.php?controller=user&task=inscription">Inscription</a></li>
                            <li class="list-item"><a class="item-link" href="index.php?controller=user&task=connexion">Connexion</a></li>
                            <?php
                        }
                   ?>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
          <?=$content?>
        </div>

    </main>

    <footer>
    
    </footer>
</body>
</html>