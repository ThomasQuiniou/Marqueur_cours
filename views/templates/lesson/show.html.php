<?php
    if(is_granted('ROLE_ADMIN')){
?>
    <form class="form_lesson_creation" action="" method="POST">
        <div>
            <h1>Nouvelle leçon</h1>
            <label for="name">Nom du cours :</label>
            <input type="text" name="name" id="name">
            <button class="gris" type="submit">Créer le cours</button>
        </div>
    </form>
<?php
}
?>
<nav class="nav-lesson">
    <ul class=lesson-list>
        <?php 
            foreach($lessons as $lesson) {
                ?>
                    <li class="list-item">
                        <a class="item-link" href="index.php?controller=lesson&task=view&param=<?=$lesson['id']?>">
                            <h2><?=$lesson['name']?></h2>
                            <div class="style-img">
                                <img src="img/logo-html.svg" alt="">
                            </div>
                        </a>
                    </li>
                <?php
            }    
        ?>
    </ul>
</nav>