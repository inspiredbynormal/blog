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

function categories()
{
    $menu_cats = DB::table('categories')->where('status', 'active')->limit(5)->orderBy('id', 'DESC')->get();
    return $menu_cats;
}
