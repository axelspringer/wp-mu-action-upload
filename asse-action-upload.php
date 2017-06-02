<?php

use Asse\Plugin\AsseHelpers\HelperFactory;

defined( 'ABSPATH' ) || exit;

class Asse_Upload {

    public function __construct() {
        add_action( 'wp_handle_upload_prefilter', array( $this, 'add_timestamp' ) );
    }

    public function add_timestamp( $upload ) {
        $pathinfo = pathinfo( $upload );

        return $pathinfo[ 'filename' ] . '_' . time() . '.' . $pathinfo[ 'extension' ];
    }
}

$asse_upload = new Asse_Upload();

