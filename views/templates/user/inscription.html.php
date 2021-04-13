<?php
    var_dump($errors);
?>

<form action="" method="POST">
    <div>
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" id="firstname">
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="emailConfirm">Confirmez votre email:</label>
        <input type="email" name="emailConfirm" id="emailConfirm">
    </div>
    <div>
        <label for="password">Entrez votre mot de passe :</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="passwordConfirm">Confirmez votre mot de passe :</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm">
    </div>
    <div>
        <button type="submit">Inscription</button>
    </div>
   
    
</form>