<?php

namespace Drupal\review\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Serialization\Json;

/**
 * Provides a 'ClockWidget' Block.
 *
 * @Block(
 *   id = "ClockWidget",
 *   admin_label = @Translation("ClockWidget"),
 *   category = @Translation("ClockWidget"),
 * )
 */
class ClockWidget extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    $form['timezone'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Enter The Timezone You Want:'),
    ];
    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state){    
    $this->setConfigurationValue('timezone',$form_state->getValue('timezone'));       
  }

  public function build() {
    $servicedata = \Drupal::service('clockservice');
    $data = $servicedata->clockservice($timezone);
    $result = Json::decode($data);
    
    print_r($result);
  }

}