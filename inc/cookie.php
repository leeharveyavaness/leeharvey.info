<?php
        if(isset($_COOKIE['page_visit'])) {
                setcookie('page_visit', ++$_COOKIE['page_visit'], time() + 5);
        } else {
                setcookie('page_visit', 1, time() + 5);
                $_COOKIE['page_visit'] = 1;
        }