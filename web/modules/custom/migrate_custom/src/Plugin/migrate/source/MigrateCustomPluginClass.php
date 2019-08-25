<?php

namespace Drupal\migrate_custom\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Provides a 'MigrateCustomPluginClass' migrate source.
 *
 * @MigrateSource(
 *  id = "migrate_custom_plugin_class",
 *  source_module = "migrate_custom"
 * )
 */
class MigrateCustomPluginClass extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $fields = [
      'id',
      'name',
      'price',
      'description',
    ];
    return $this->select('legacy', 'u')
      ->fields('u', $fields);
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('Primary Key'),
      'name' => $this->t('The name'),
      'price' => $this->t('The price.'),
      'description' => $this->t('The decription.'),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return ['id' => ['type' => 'integer']];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    return parent::prepareRow($row);
  }

}
