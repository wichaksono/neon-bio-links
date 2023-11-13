<?php
/*
Plugin Name: NEON Bio Link
Plugin URI: http://neon.web.id/neon-agent/
Description: --
Requires PHP: 7.4
Author: NEON Web Developer
Version: 1.0
Author URI: http://neon.web.id/
*/

defined('ABSPATH') or die();

define( 'NEONBIOLINKS_DIR', __DIR__ );
define( 'NEONBIOLINKS_FILE', __FILE__ );

require_once NEONBIOLINKS_DIR . '/bootstrap/Bootstrap.php';

\NeonBioLinks\Bootstrap\Bootstrap::run();