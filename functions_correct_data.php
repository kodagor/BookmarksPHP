<?php

    function filled($form_var) {
        // check, if every variable has a value
        foreach ($form_var as $key => $value) {
            if ((!isset($key)) || ($value == '')) {
                return false;
            }
        }
        return true;
    }

    function correct_email($email) {
        // checking if email address is correct
        if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email)) {
            return true;
        } else {
            return false;
        }
    }

?>