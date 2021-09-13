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
    $menu_cats = DB::table('categories')->where('status', 'active')->limit(4)->orderBy('id', 'DESC')->get();
    return $menu_cats;
}

function categoriesTop($limit)
{
    $menu_cats = DB::table('categories')->where('status', 'active')->limit($limit)->orderBy('id', 'DESC')->get();
    return $menu_cats;
}
