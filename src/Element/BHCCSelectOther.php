<?php

namespace Drupal\bhcc_webform_select_other\Element;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Element\WebformSelectOther;

/**
 * Provides a webform element for the BHCC select other pattern.
 *
 * @FormElement("bhcc_select_other")
 */
class BHCCSelectOther extends WebformSelectOther {

  /**
   * {@inheritdoc}
   */
  public static function processWebformOther(&$element, FormStateInterface $form_state, &$complete_form) {

    // Get the parent element.
    $element = parent::processWebformOther($element, $form_state, $complete_form);

    // Add the other checkbox.
    $element['_other_'] = [
      '#type' => 'checkbox',
      '#title' => $element['#other_checkbox_label'] ?? t('Option not listed above'),
      '#weight' => '10',
      '#return_value' => '_other_',
      '#attributes' => [
        'class' => [
          'bhcc-webform-select-other-checkbox',
          'js-bhcc-webform-select-other-checkbox',
        ],
      ],
    ];

    // Set other option textbox label, description and placeholder.
    if (!empty($element['#other_option_label'])) {
      $element['other']['#title'] = $element['#other_option_label'];
      $element['other']['#title_display'] = 'before';
    }
    $element['other']['#description'] = $element['#other_option_description'] ?? '';
    $element['other']['#placeholder'] = $element['#other_option_placeholder'] ?? '';

    // Custom classes for the elements JS and styling.
    $element['#attributes']['class'] = array_merge($element['#attributes']['class'], [
      'bhcc-webform-select-other',
      'js-bhcc-webform-select-other',
    ]);

    // Attach this elements JS library.
    $element['#attached']['library'][] = 'bhcc_webform_select_other/bhcc_webform_select_other_element';

    return $element;
  }

}
