<?php

namespace Drupal\my_first_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class MyPageController extends ControllerBase {

  public function content() {

    $form = \Drupal::formBuilder()->getForm(
      'Drupal\my_first_module\Form\MyAjaxForm'
    );

    return [
      'hello' => [
        '#markup' => 'Hello, Drupal!<br>' . date('d.m.Y H:i') . '<hr>',
      ],
      'form' => $form,
      '#cache' => [
        'max-age' => 0,
      ],
    ];

  }

}
