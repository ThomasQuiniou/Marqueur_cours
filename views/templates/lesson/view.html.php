 <p><?=$name?></p>
<p><?=isset($time)?$time:""?></p>

<?php
    if (is_granted('ROLE_ADMIN')){
        if($time_end === null){
        ?>
            <form action="" method="POST">
                <button type="submit" name="stopLesson">Arrêter le cours</button>
            </form>
        <?php
        }
    }
    
    if($time_end === null){
    ?>
        <form action="" method="POST">
            <button type="submit" name="validMarqueur">Marquer</button>
        </form>
    <?php
    }
?>
<?php
    foreach($marqueurs as $marqueur){
        $newDateMarqueur = new DateTime($marqueur['marqueur_time']);
        $dateMarqueur = $newDateMarqueur->format('H:i:s');

        $newDateLesson = new DateTime($marqueur['heure_depart']);
        $dateLesson = $newDateLesson->format('H:i:s');

        $timeDiff = dateDif(strtotime($dateMarqueur), strtotime($dateLesson));

        $second = $timeDiff['second'] < 10 ? 0 . $timeDiff['second'] : $timeDiff['second'] ;
        $minute = $timeDiff['minute'] < 10 ? 0 . $timeDiff['minute'] : $timeDiff['minute'] ;
        $hour = $timeDiff['hour'];

        $time = $hour . "h" . $minute . "m" . $second . "s";
        ?>

        <p><?=$marqueur['name_user']?> <?=$marqueur['firstname']?> à <?=$time?></p>
        <p><?=$marqueur['content']?></p></br>
        <?php 
    }
?>