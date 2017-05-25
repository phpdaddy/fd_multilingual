<?php


require __DIR__ . '/vendor/autoload.php';

/*
Plugin Name: FD multilingual
Description: FD multilingual
Author: phpdaddy
*/

class FDmultilingual
{
    public function __invoke()
    {
        ini_set('max_execution_time', 300);
        add_action('admin_menu', array($this, 'plugin_setup_menu'));
    }

    public function plugin_setup_menu()
    {
        add_menu_page('FD multilingual', 'FD multilingual', 'manage_options', 'fd-multilingual', array($this, 'submit_button_admin_page'));

    }

    public function submit_button_admin_page()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient pilchards to access this page.'));
        }

        if (isset($_POST['submit_button']) && check_admin_referer('fdm_submit_button_clicked')) {
            $this->submit_button_action();
            return;
        }

        echo '<div class="wrap">';

        echo '<h2>FD multilingual</h2>';


        echo '<form action="admin.php?page=fd-multilingual" method="post">';
        echo 'CSV url: <br>';

        wp_nonce_field('fdm_submit_button_clicked');
        echo '<input type="hidden" value="true" name="submit_button" />';
        submit_button('Import images');
        echo '</form>';

        echo '</div>';

    }

    private function submit_button_action()
    {
        echo '<div id="message" class="updated fade"><p>'
            . 'Configuration saved.' . '</p></div>';

    }
}

(new FDmultilingual())->__invoke();

?>