<?php

if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}
// Site cityudev1, environment dev
$aliases['dev'] = array(
  'root' => '/var/www/html/cityudev1.dev/docroot',
  'ac-site' => 'cityudev1',
  'ac-env' => 'dev',
  'ac-realm' => 'devcloud',
  'uri' => 'cityudev1mk9h422jfm.devcloud.acquia-sites.com',
  'remote-host' => 'free-6620.devcloud.hosting.acquia.com',
  'remote-user' => 'cityudev1.dev',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  )
);
$aliases['dev.livedev'] = array(
  'parent' => '@cityudev1.dev',
  'root' => '/mnt/gfs/cityudev1.dev/livedev/docroot',
);

if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}
// Site cityudev1, environment test
$aliases['test'] = array(
  'root' => '/var/www/html/cityudev1.test/docroot',
  'ac-site' => 'cityudev1',
  'ac-env' => 'test',
  'ac-realm' => 'devcloud',
  'uri' => 'cityudev1hewhbnrjlm.devcloud.acquia-sites.com',
  'remote-host' => 'free-6620.devcloud.hosting.acquia.com',
  'remote-user' => 'cityudev1.test',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  )
);
$aliases['test.livedev'] = array(
  'parent' => '@cityudev1.test',
  'root' => '/mnt/gfs/cityudev1.test/livedev/docroot',
);
