<?php $title = "Home" ?>
<h1>Home</h1>
<p><?=!empty($_SESSION['id']) ? $_SESSION['name'] : ""?></p>
