<?php

// @codingStandardsIgnoreFile

use Asse\Plugin\AsseHelpers\HelperFactory;

/**
 * Modifies the file name before the file is moved to its final location.
 *
 * @wp-hook wp_handle_upload_prefilter
 * @param $file
 * @return mixed
 */
function modifyFileName($file)
{
    $file['name'] = HelperFactory::get('file')->addTimestamp($file['name']);

    return $file;
}
add_action('wp_handle_upload_prefilter', 'modifyFileName');

/**
 * Disable usage of year/month folders for uploads.
 *
 * @wp-hook init
 */
function disableUploadsUseYearmonthFolders()
{
    update_option('uploads_use_yearmonth_folders', false);
}
add_action('init', 'disableUploadsUseYearmonthFolders');
