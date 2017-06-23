<?php

namespace Drupal\migrate_catering\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

/**
 * Provides a 'HelloController'.
 */
class HelloController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function content() {
    // Switch to external database.
    Database::setActiveConnection('external');

    // Get a connection going.
    $db = Database::getConnection();

    $query = $db->select('content', 'c');
    $query->fields('c', ['id', 'title']);
    $query->orderBy('title');
    $content = $query->execute()->fetchAllKeyed();

    // Switch back.
    Database::setActiveConnection();

    $markup = '<ul>';
    foreach ($content as $key => $val) {
      $markup .= "<li>" . $key . ": " . $val . "</li>";
    }
    $markup .= '</ul>';

    return [
      '#type' => 'markup',
      '#markup' => $markup,
    ];
  }

}
