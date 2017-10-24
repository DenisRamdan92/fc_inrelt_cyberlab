<?php

class Session_expire {

    function add_time_tiket() {
        $timeout = 1;
        $_SESSION['tiket_id'] = time() + $timeout;
    }

    function check_time_tiket() {
        $exp_time = isset($_SESSION['tiket_id']);
        if (time() < $exp_time) {
            $add = new Session_expire();
            $add->add_time_tiket();
        } else {
            unset($_SESSION['tiket_id']);
        }
    }

}

?>
