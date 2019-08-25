<?php

namespace Drupal\generate_menu\Service;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\menu_link_content\Entity\MenuLinkContent;

class MenuService {

  /**
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  private $entityManager;

  /**
   * MenuService constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityManager
   */
  public function __construct(EntityTypeManagerInterface $entityManager) {
    $this->entityManager = $entityManager;
  }

  public function createMenuElement($menu, $menu_name, $parent = FALSE) {
    $expanded = TRUE;
    $menu_element = [
      'title' => $menu['title'],
      'link' => ['uri' => $menu['uri']],
      'expanded' => $expanded,
    ];

    if (key_exists('weight', $menu)) {
      $menu_element['weight'] = $menu['weight'];
    }

    if (!is_null($menu_name)) {
      $menu_element['menu_name'] = $menu_name;
    }
    if ($parent !== FALSE) {
      $menu_element['parent'] = $parent;
    }

    $element = MenuLinkContent::create($menu_element);
    $element->save();

    if ((key_exists('subtree', $menu)) && (count($menu['subtree']) > 0)) {
      foreach ($menu['subtree'] as $new_element) {
        $this->createMenuElement($new_element, NULL, $element->getPluginId());
      }
    }
  }

  /**
   * Elimina los elementos del menú.
   */
  public function removeMenuElements($menu) {
    if ($this->getMenuById($menu)) {
      $mids = \Drupal::entityQuery('menu_link_content')
        ->condition('menu_name', $menu)
        ->execute();

      $controller = $this->entityManager->getStorage('menu_link_content');
      $entities = $controller->loadMultiple($mids);
      $controller->delete($entities);
    }
  }

  public function getMenuById($id) {
    $menu = $this->entityManager->getStorage('menu')->load($id);

    return is_null($menu) ? FALSE : $menu;
  }
}
