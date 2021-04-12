<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?controller=user&task=inscription">Inscription</a></li>
                <li><a href="index.php?controller=user&task=connexion">Connexion</a></li>
                <li><a href="index.php?controller=user&task=deconnexion">Deconnexion</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?=$content?>
    </main>

    <footer>
    
    </footer>
</body>
</html>