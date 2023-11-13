<?php
namespace NeonBioLinks\Bootstrap;

use NeonBioLinks\Src\Classes\Admin;

class Bootstrap {

    private static ?Bootstrap $run = null;

    public static function run(): Bootstrap
    {
        if ( ! self::$run instanceof self ) {
            self::$run = new self();
        }

        return self::$run;
    }

    private function __construct() {

        spl_autoload_register( [$this, 'includes'] );

        add_action( 'plugins_loaded', [$this, 'loaded'] );

    }

    public function includes( $class ) {

        $baseNamespace = 'NeonBioLinks';

        $namespaceLength = strlen( $baseNamespace );

        if ( strncmp( $baseNamespace, $class, $namespaceLength ) !== 0 ) {
            return;
        }

        $className = substr( $class, $namespaceLength );

        $classPath = str_replace( '\\', '/', $className );

        $classFile = NEONBIOLINKS_DIR . DIRECTORY_SEPARATOR . $classPath . '.php';

        if ( file_exists( $classFile ) ) {
            include( $classFile );
        }
    }

    public function loaded() {
        Admin::init();
    }
}