<?php
    function dateDif($date_marqueur, $date_lesson){
        $diff = abs($date_marqueur - $date_lesson);
        $newdate = [];

        $time = $diff;

        $newdate['second'] = $time % 60;

        $time = floor(($time - $newdate['second']) / 60);
        $newdate['minute'] = $time % 60;
        $time = floor(($time - $newdate['minute']) / 60);
        $newdate['hour'] = $time % 24;
        $time = floor(($time - $newdate['hour']) / 24);
        $newdate['day'] = $time;
        return $newdate;
    }

    function is_granted($role){
        if(!empty($_SESSION['id'])){
            $userRole = json_decode($_SESSION['roles']);
        }
        else{
            return false;
        }
        if (in_array($role, $userRole)){
            return true;
        }
        else{
            return false;
        }

    }

?>