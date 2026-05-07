<?php

namespace Drupal\my_first_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides Current Route Block.
 *
 * @Block(
 *   id = "current_route_block",
 *   admin_label = @Translation("Current Route Block")
 * )
 */
class CurrentRouteBlock extends BlockBase {

  public function build() {

    $route_match = \Drupal::routeMatch();

    $route_name = $route_match->getRouteName();

    $output = 'Текущий route: ' . $route_name;

    $node = $route_match->getParameter('node');

    if ($node) {

      $entity_info = \Drupal::service('my_first_module.entity_info');

      $node_info = $entity_info->getEntityInfo(
        'node',
        $node->id()
      );

      if (!empty($node_info['label'])) {
        $output .= '<br><hr><br>Node title: ' . $node_info['label'];
      }

    }

    return [
      '#markup' => $output,
      '#cache' => [
        'contexts' => ['route'],
      ],
    ];

  }

}
