<?php 

//ketika sudah login dan ingin mengakses url yang berada diluar login tanpa logout maka akan di tendang
function goToDefaultPage()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') == 1) {
        redirect('admin');
    } else if ($ci->session->userdata('role_id') == 2) {
        redirect('userpetugas');
    } else if ($ci->session->userdata('role_id') == 3) {
        redirect('pelanggan');
    }
}

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAcces = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($userAcces->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

?>