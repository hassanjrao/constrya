<?php

if (!function_exists('userSubscribed')) {
    function userSubscribed()
    {
        if(!auth()->check()) {
            return false;
        }

        $user=auth()->user();


        if($user->subscribed_at) {
            return true;
        }

        return false;
    }
}

?>
