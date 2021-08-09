<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }
}

function is_authority()
{
    $ci = get_instance();
    $role = $ci->session->userdata('role_id');
    if ($role != 1 && $role != 2) {
        redirect('home');
    }
}
