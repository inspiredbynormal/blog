<?php
function userDetails($user_id)
{
    if ($user_id != '') {
        $user = DB::table('users')->select('name', 'email')->where('id', $user_id)->first();
        return $user;
    } else {
        return false;
    }
}
