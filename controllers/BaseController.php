<?php
namespace controllers;

class BaseController {

    const SEPARATOR = "\r\n";
    const AUTHENTICITYKEY = "6933b5ac6844b8096856b1fea0e837ebe88af079979a8ad9dc75deda661f1ab5";

    public function __construct() {
        add_action('admin_menu', array(&$this, 'addMenu'));
        add_shortcode('securelogin', array(&$this, 'secureLoginOutput'));
    }

    public function addMenu() {
        add_menu_page('SecureLogin', 'SecureLogin', 'edit_users', 'securelogin', array(&$this, 'secureLoginOptionPage'), 'dashicons-lock');
    }

    /**
     *
     */
    public function secureLoginOptionPage() {
        if(!current_user_can('edit_users')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        include(sprintf("%s/../views/options.php", dirname(__FILE__)));
    }

    /**
     *
     */
    public function secureLoginOutput($atts) {

        $attr = shortcode_atts( array(
            'subdomein' => '',
            'subdomain' => '',
            'domain' => '',
            'background' => '#222',
            'text' => '#FFF',
        ), $atts);

        $username = "Username";
        $password = "Password";
        $login = "Login";
        if (get_locale() == "nl_NL") {
            $username = "Gebruikersnaam";
            $password = "Wachtwoord";
            $login = "Inloggen";
        }

        $this->assets();

        if (!empty($attr['domain'])){
            $postUrl = 'https://' . $attr['domain'].'/login/exec';
            $forgotUrl = 'https://' . $attr['domain'].'/auth/forgot';
        }elseif(!empty($attr['subdomain'])){
            $postUrl = 'https://' . $attr['subdomain'].'.securelogin.nu/login/exec';
            $forgotUrl = 'https://' . $attr['subdomain'].'.securelogin.nu/auth/forgot';
        }else{
            $postUrl = 'https://' . $attr['subdomein'] . '.securelogin.nu/login/exec';
            $forgotUrl = 'https://' . $attr['subdomein'].'.securelogin.nu/auth/forgot';
        }
    
        $authenticityToken = base64_encode(implode(";",[
                             base64_encode($nonce = random_bytes(32)),
                             $time = time(),
                             $host = $_SERVER['HTTP_HOST'],
                             base64_encode(
                             hash_hmac(
                             "sha256", 
                             implode(":",[$nonce,$time,$host]), 
                             self::AUTHENTICITYKEY, true)),
        ]));
   
        $html = array();
        $html[] = '<form method="post" action="' . $postUrl . '" class="sl-form" target="_blank">';
        $html[] = '
                   <input type="hidden" name="authenticityToken" value="'.$authenticityToken.'">
                   <div class="sl-group sl-username">
                       <label class="sl-label">' . $username . '</label>
                       <div class="sl-controls">
                           <input for="username" type="text" name="username" id="username" placeholder="'. $username .'" value="" class="sl-input">
                       </div>
                   </div>
                   <div class="sl-group sl-password">
                       <label class="sl-label">' . $password . '</label>
                       <div class="sl-controls">
                           <input for="password" type="password" name="password" id="password" class="sl-input" placeholder="'. $password .'"><br>
                       </div>
                   </div>
           <div id="sl-forgotten">
             <a href="'.$forgotUrl.'">Forgot your password?</a>
           </div>
                   <div class="sl-group sl-button">
                       <button type="submit" class="btn-login" style="background-color: ' . $attr['background'] . '; color: ' . $attr['text'] . ';">' . $login . '</button>
                   </div>';
        $html[] = '</form>';

        return implode($html, self::SEPARATOR);
    }

    protected function assets() {
        $cssPath = plugins_url('../assets/css/securelogin.css', __FILE__);
        wp_enqueue_style('securelogin', $cssPath);
    }
}
