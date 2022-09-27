<?php

namespace Drupal\bhcc_webform_select_other\Plugin\WebformElement;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformElement\WebformSelectOther;
use Drupal\webform\Plugin\WebformElementOtherInterface;

/**
 * Provides a 'bhcc_select_other' element.
 *
 * @WebformElement(
 *   id = "bhcc_select_other",
 *   label = @Translation("BHCC Select other"),
 *   description = @Translation("Implement the BHCC pattern for select other...."),
 *   category = @Translation("Options elements"),
 * )
 */
class BHCCSelectOther extends WebformSelectOther implements WebformElementOtherInterface {

  /**
   * {@inheritdoc}
   */
  protected function defineDefaultProperties() {
    return [
      'other_checkbox_label' => $this->t('Option not listed above'),
      'other_option_label' => $this->t('Other'),
      'other_option_description' => '',
      'other_option_placeholder' => $this->t('Enter other&hellip;'),
    ] + parent::defineDefaultProperties();
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    // Other checkbox settings.
    $form['other_option'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Other option settings'),
      '#weight' => -10,
    ];
    $form['other_option']['other_checkbox_label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Other checkbox label'),
      '#description' => $this->t('The label used for the other checkbox.'),
      '#size' => 64,
      '#required' => TRUE,
    ];

    $form['other_option']['other_option_label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Other option text box label'),
      '#description' => $this->t('Label for the other option text box.'),
      '#size' => 64,
    ];

    // Other checkbox settings.
    $form['other_option']['other_option_description'] = [
      '#type' => 'webform_html_editor',
      '#title' => $this->t('Other option description'),
      '#description' => $this->t('Description / help text for the other option text box.'),
      /* '#value' => $form_state->getValue('other_option_description')['value'] ?? '',*/
      '#rows' => 3,
    ];

    // Other checkbox settings.
    $form['other_option']['other_option_placeholder'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Other option placeholder'),
      '#description' => $this->t('Placeholder text inside the other option text box.'),
      '#size' => 64,
    ];

    return $form;
  }

}
