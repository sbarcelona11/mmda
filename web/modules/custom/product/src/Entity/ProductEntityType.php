<?php

namespace Drupal\product\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Product entity type entity.
 *
 * @ConfigEntityType(
 *   id = "product_entity_type",
 *   label = @Translation("Product entity type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\product\ProductEntityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\product\Form\ProductEntityTypeForm",
 *       "edit" = "Drupal\product\Form\ProductEntityTypeForm",
 *       "delete" = "Drupal\product\Form\ProductEntityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\product\ProductEntityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "product_entity_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "product_entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/product_entity_type/{product_entity_type}",
 *     "add-form" = "/admin/structure/product_entity_type/add",
 *     "edit-form" = "/admin/structure/product_entity_type/{product_entity_type}/edit",
 *     "delete-form" = "/admin/structure/product_entity_type/{product_entity_type}/delete",
 *     "collection" = "/admin/structure/product_entity_type"
 *   }
 * )
 */
class ProductEntityType extends ConfigEntityBundleBase implements ProductEntityTypeInterface {

  /**
   * The Product entity type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Product entity type label.
   *
   * @var string
   */
  protected $label;

}
