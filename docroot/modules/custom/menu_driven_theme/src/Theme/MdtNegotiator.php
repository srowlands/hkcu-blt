<?php

namespace Drupal\mdt\Theme;

use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Theme\ThemeNegotiatorInterface;
use Drupal\system\Entity\Menu;

/**
 * The Menu Driven Theme negotiator.
 *
 * @group cityu
 */
class MdtNegotiator implements ThemeNegotiatorInterface {

  /**
   * {@inheritdoc}
   */
  public function applies(RouteMatchInterface $route_match) {

    $applies = FALSE;

    $menus = Menu::loadMultiple();

    foreach ($menus as $menu_name => $menu) {
      if (NULL !== $menu->getThirdPartySetting('mdt', 'menu_active_theme')) {
        $link = \Drupal::service('menu.active_trail')
          ->getActiveLink($menu_name);
        if (!empty($link)) {
          $applies = TRUE;
        }
      }
    }

    // Use this theme negotiator.
    return $applies;
  }

  /**
   * {@inheritdoc}
   */
  public function determineActiveTheme(RouteMatchInterface $route_match) {

    $menus = Menu::loadMultiple();

    foreach ($menus as $menu_name => $menu) {
      if (NULL !== $menu->getThirdPartySetting('mdt', 'menu_active_theme')) {
        $link = \Drupal::service('menu.active_trail')
          ->getActiveLink($menu_name);

        if (!empty($link)) {
          return $menu->getThirdPartySetting('mdt', 'menu_active_theme');
        }
      }
    }

  }

}
