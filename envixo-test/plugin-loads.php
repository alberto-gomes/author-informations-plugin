<?php 

require_once ENVIXO_PLUGIN_DIR . '/includes/functions.php';

add_action( 'admin_enqueue_scripts', 'envixo_include_js' );

function envixo_include_js() {
	
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
 
     wp_enqueue_script( 'myuploadscript', ENVIXO_PLUGIN_URL . '/index.js', array( 'jquery' ) );
}

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>

    header.plugin-header {
        display: grid;
        justify-content: center;
        height: 108px;
        margin-top: 94px;
        align-content: center;
        max-width: 1663px;
        background: #214D96 0% 0% no-repeat padding-box;
        border-radius: 10px;
        opacity: 1;
        margin-right: 25px;
    }

    main {
        font-family: "Quicksand", sans-serif;
        max-width: 1663px;
        background: #FFFFFF 0% 0% no-repeat padding-box;
        box-shadow: 0px 0px 6px #00000012;
        border: 1px solid #DCDCDC;
        border-radius: 10px;
        opacity: 1;
        padding: 78px 33px 57px 57px;
        margin-right: 25px;
    }

    .form-table td {
        padding: 0;
    }

    input[type=text], textarea { 
        width: 100%;
    }

    .btn-upload {
        padding: 16px 33px;
        justify-self: center;
        background: #214D96 0% 0% no-repeat padding-box;
        border-radius: 10px;
        opacity: 1;
        color: white;
        text-decoration: none;
        cursor: pointer;
        border: none;
    }

    .btn-upload:hover {
        color: white;
    }

    .upload-area { 
        display: grid;
    }

    .wp-core-ui p .button {
        background: #23C062 0% 0% no-repeat padding-box;
        border-radius: 10px;
        opacity: 1;
        padding: 16px 33px;
    }

    .upload-area img { 
        width: 184px;
        border-radius: 100px;
        justify-self: center;
    }

    .misha-upl {
        display: grid;
    }

    .upload-area a { 
        text-decoration: none;
    }

    .remove {
        background-color: red;
        color: white;
        border-radius: 101px;
        padding: 5px 8px;
        font-size: 18px;
        position: absolute;
        left: 55%;
        top: 29%;
    }

    .mt-45 { 
        margin-top: 45px;
    }

    .remove:after {
        display: inline-block;
        content: "\00d7";
    }

    .inv {
        display: none;
    }
  </style>';
}

function wpb_add_google_fonts() {
 
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet', false ); 
    }
     
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


class load_language 
{
    public function __construct()
    {
    add_action('init', array($this, 'load_my_transl'));
    }

     public function load_my_transl()
    {
        load_plugin_textdomain('envixo-plugin', FALSE, ENVIXO_PLUGIN_BASENAME . '/languages/');
    }
}

$lang = new load_language;