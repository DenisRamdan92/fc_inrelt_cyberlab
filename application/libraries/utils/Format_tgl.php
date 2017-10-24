<?php

class Format_tgl {

    function format_date_mysql($date) {
        $exp = explode('/', $date);
        if (count($exp) == 3) {
            $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
        }
        return $date;
    }

    function format_date_indo($date) {
        $exp = explode('-', $date);
        if (count($exp) == 3) {
            $date = $exp[2] . '/' . $exp[1] . '/' . $exp[0];
        }
        return $date;
    }

}

?>
