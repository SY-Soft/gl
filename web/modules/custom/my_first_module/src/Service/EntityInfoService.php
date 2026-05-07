<?php

namespace Drupal\my_first_module\Service;

use Drupal\Core\Entity\EntityTypeManagerInterface;

class EntityInfoService {

  protected $entityTypeManager;

  public function __construct(
    EntityTypeManagerInterface $entityTypeManager
  ) {
    $this->entityTypeManager = $entityTypeManager;
  }

  public function getEntityInfo($entity_type, $entity_id) {

    $storage = $this->entityTypeManager->getStorage($entity_type);

    $entity = $storage->load($entity_id);

    if (!$entity) {
      return [
        'error' => 'Entity not found',
      ];
    }

    return [
      'id' => $entity->id(),
      'label' => $entity->label(),
      'type' => $entity->getEntityTypeId(),
    ];

  }

}
