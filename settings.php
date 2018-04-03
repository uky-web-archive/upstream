<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all envrionments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to insure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * override config import path
 */
$is_installer_url = (strpos($_SERVER['SCRIPT_NAME'], '/core/install.php') === 0);
if ($is_installer_url) {
  $config_directories = array(
    CONFIG_SYNC_DIRECTORY => 'sites/default/config',
  );
}

/**
 * use configuration installer profile
 */
$settings['install_profile'] = 'config_installer'; 

/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}