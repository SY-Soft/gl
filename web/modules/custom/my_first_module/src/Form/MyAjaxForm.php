<?php

namespace Drupal\my_first_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class MyAjaxForm extends FormBase {

  public function getFormId() {
    return 'my_ajax_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Введите текст'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Отправить'),
      '#ajax' => [
        'callback' => '::ajaxCallback',
        'wrapper' => 'result-wrapper',
      ],
    ];

    $value = $form_state->getValue('text');

    $form['result'] = [
      '#type' => 'markup',
      '#markup' => '<div id="result-wrapper">' .
        ($value ? 'Результат: ' . $value : '') .
        '</div>',
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRebuild();
  }

  public function ajaxCallback(array &$form, FormStateInterface $form_state) {
    return $form['result'];
  }

}
