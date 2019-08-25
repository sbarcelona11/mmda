<?php
/**
 * @file
 * Contains \Drupal\generate_menu\Plugin\Block\MeuMenuBlock.
 */

namespace Drupal\generate_menu\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Link;

/**
 * Provides a 'SectionsFooter' block.
 *
 * @Block(
 *   id = "meu_menu",
 *   admin_label = @Translation("My menu"),
 *   category = @Translation("generate_menu")
 * )
 */
class MeuMenuBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $menu_name = 'meu_menu';
    $menu_tree = \Drupal::menuTree();

    // This one will give us the active trail in *reverse order*.
    // Our current active link always will be the first array element.
    $parameters = $menu_tree->getCurrentRouteMenuTreeParameters($menu_name);
    $active_trail = array_keys($parameters->activeTrail);

    // But actually we need its parent.
    // Except for <front>. Which has no parent.
    $parent_link_id = isset($active_trail[1]) ? $active_trail[1] : $active_trail[0];

    // Having the parent now we set it as starting point to build our custom
    // tree.
    $parameters->setRoot($parent_link_id);
    $parameters->setMaxDepth(3);
    $parameters->excludeRoot();
    $tree = $menu_tree->load($menu_name, $parameters);

    // Optional: Native sort and access checks.
    $manipulators = [
      ['callable' => 'menu.default_tree_manipulators:checkNodeAccess'],
      ['callable' => 'menu.default_tree_manipulators:checkAccess'],
      ['callable' => 'menu.default_tree_manipulators:generateIndexAndSort'],
    ];
    $tree = $menu_tree->transform($tree, $manipulators);
    $build = $menu_tree->build($tree);
    $build['#theme'] = 'menu';

    $build['#contextual_links']['menu'] = [
      'route_parameters' => ['menu' => $menu_name],
    ];

    $output = $build;

//    dump($tree);
//    $list = [];
//
//    foreach ($tree as $item) {
//      $title = $item->link->getTitle();
//      $url = $item->link->getUrlObject();
//      $subtree = $item->subtree;
//      $arr = [
//        'title' => $title,
//        //'url' => $url->getUri(),
//        'below' => $subtree
//      ];
//      $list[] = json_decode (json_encode ($arr), FALSE);
//
//      //$list[] = Link::fromTextAndUrl($title, $url);
//    }
//
//    dump($list);

//    $output['sections'] = array(
//      //'#theme' => 'item_list',
//      '#items' => $build,
//    );
    return $output;
  }
}
