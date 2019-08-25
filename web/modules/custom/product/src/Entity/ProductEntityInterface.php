<?php

namespace Drupal\product\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Product entity entities.
 *
 * @ingroup product
 */
interface ProductEntityInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Product entity name.
   *
   * @return string
   *   Name of the Product entity.
   */
  public function getName();

  /**
   * Sets the Product entity name.
   *
   * @param string $name
   *   The Product entity name.
   *
   * @return \Drupal\product\Entity\ProductEntityInterface
   *   The called Product entity entity.
   */
  public function setName($name);

  /**
   * Gets the Product entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Product entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Product entity creation timestamp.
   *
   * @param int $timestamp
   *   The Product entity creation timestamp.
   *
   * @return \Drupal\product\Entity\ProductEntityInterface
   *   The called Product entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the Product entity revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Product entity revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\product\Entity\ProductEntityInterface
   *   The called Product entity entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Product entity revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Product entity revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\product\Entity\ProductEntityInterface
   *   The called Product entity entity.
   */
  public function setRevisionUserId($uid);

}
