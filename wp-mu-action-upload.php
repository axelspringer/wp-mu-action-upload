<?php

defined( 'ABSPATH' ) || exit;

class Axelspringer_Upload {

    public function __construct() {
        add_action( 'wp_handle_upload_prefilter', array( $this, 'add_timestamp' ) );
    }

    public function add_timestamp( $upload ) {
        $pathinfo = pathinfo( $upload['name'] );
        $upload['name'] = $pathinfo[ 'filename' ] . '_' . time() . '.' . $pathinfo[ 'extension' ];
        return $upload;
    }
}

$axelspringer_upload = new Axelspringer_Upload();

