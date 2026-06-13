<?php

add_action( 'admin_menu', 'birbot_edit_page' );

function birbot_edit_page() {
    add_submenu_page(
        null,
        'Detaylı Düzenle',
        'Detaylı Düzenle',
        'manage_options',
        'birbot-duzenle',
        'birbot_edit'
    );
}

function birbot_edit()
{
  include get_template_directory() . "/birbot/views/edit.view.php";
}
