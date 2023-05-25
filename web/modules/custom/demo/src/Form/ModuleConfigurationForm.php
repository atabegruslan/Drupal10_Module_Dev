<?php

namespace Drupal\demo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class ModuleConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'demo_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'demo.admin_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('demo.admin_settings');
    $form['config1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Config 1'),
      '#default_value' => $config->get('config1_var'),
      '#description' => 'Config 1 description',
      '#description_display' => 'after',
    ];
    $form['config2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Config 2'),
      '#default_value' => $config->get('config2_var'),
      '#description' => 'Config 2 description',
      '#description_display' => 'after',
    ];
    $form['config3'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Config 3'),
      '#default_value' => $config->get('config3_var'),
      '#description' => 'Config 3 description',
      '#description_display' => 'after',
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) 
  {
    $this->config('demo.admin_settings')
      ->set('config1_var', $form_state->getValue('config1'))
      ->set('config2_var', $form_state->getValue('config2'))
      ->set('config3_var', $form_state->getValue('config3'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}