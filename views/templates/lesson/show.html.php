<form action="" method="POST">
    <div>
        <label for="name"></label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <button type="submit">Créer le cours</button>
    </div>
</form>
<ul>

    <?php 
    foreach($lessons as $lesson) {
        ?>
        <li><a href="index.php?controller=lesson&task=view&param=<?=$lesson['id']?>"><?=$lesson['name']?></a></li>
        <?php
    }
    ?>
       
</ul>