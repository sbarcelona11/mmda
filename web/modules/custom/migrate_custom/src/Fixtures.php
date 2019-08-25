<?php

namespace Drupal\migrate_custom;

/**
 * Provides sample data for module's.
 */
class Fixtures {

  /**
   * Returns array of sample records for demo purposes.
   *
   * @return array
   *   Array of sample records.
   *
   */
  public static function getSampleItems() {
    return [
      [
        'name' => 'Item One',
        'price' => '100',
        'description' => 'The first item',
      ],
      [
        'name' => 'Item Two',
        'price' => '200',
        'description' => 'The second item',
      ],
      [
        'name' => 'Item Three',
        'price' => '300',
        'description' => 'The third item',
      ],
      [
        'name' => 'Item Four',
        'price' => '400',
        'description' => 'The fourth item',
      ],
      [
        'name' => 'Item Five',
        'price' => '500',
        'description' => 'The fifth item',
      ],
      [
        'name' => 'Item Six',
        'price' => '600',
        'description' => 'The sixth item',
      ],
      [
        'name' => 'Item Seven',
        'price' => '700',
        'description' => 'The seventh item',
      ],
      [
        'name' => 'Item Eight',
        'price' => '800',
        'description' => 'The eighth item',
      ],
      [
        'name' => 'Item Nine',
        'price' => '900',
        'description' => 'The ninth item',
      ],
      [
        'name' => 'Item Ten',
        'price' => '1000',
        'description' => 'The tenth item',
      ],
    ];
  }
}
