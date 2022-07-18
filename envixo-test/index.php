<?php

/**
 * Plugin Name
 *
 * @package           ENVIXO Test
 * @author            Alberto Filho
 *
 * @wordpress-plugin
 * Plugin Name:       ENVIXO Test
 * Description:       Plugin para exibir informações do autor de um post.
 * 
 */


if (!defined('ABSPATH')) exit; // Exit if accessed directly

define('ENVIXO_PLUGIN', __FILE__);
define('ENVIXO_PLUGIN_URL', plugins_url( '', ENVIXO_PLUGIN ));
define('ENVIXO_PLUGIN_BASENAME', plugin_basename(ENVIXO_PLUGIN));
define('ENVIXO_PLUGIN_DIR', untrailingslashit(dirname(ENVIXO_PLUGIN)));
define('ENVIXO_VERSION', '1.0');
require_once 'plugin-loads.php';
