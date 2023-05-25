<?php

namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;

class DemoController extends ControllerBase 
{
  public function index() 
  {
    return [
      '#theme' => 'demo_template',
      '#dummy_placeholder' => 'Default tab content',
    ];
  }
  
  public function tab2() 
  {
    $config1 = \Drupal::config('demo.admin_settings')->get('config1_var');
    $config2 = \Drupal::config('demo.admin_settings')->get('config2_var');
    $config3 = \Drupal::config('demo.admin_settings')->get('config3_var');

    return [
      '#theme' => 'tab2_template',
      '#configs' => [$config1, $config2, $config3],
    ];
  }
  
  public function tab3() 
  {
    return [
      '#theme' => 'tab3_template',
      '#log_data' => [
        [
          'col1' => 1,
          'col2' => 42,
        ],
        [
          'col1' => 2,
          'col2' => 43,
        ],
      ],
    ];
  }
}