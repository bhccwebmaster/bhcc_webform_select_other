<?php

namespace Drupal\bhcc_webform_select_other\Element;

use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a webform element for the BHCC select other pattern.
 *
 * @FormElement("bhcc_select_other_textarea")
 */
class BHCCSelectOtherTextarea extends BHCCSelectOther {

  /**
   * {@inheritdoc}
   */
  public static function processWebformOther(&$element, FormStateInterface $form_state, &$complete_form) {

    // Get the parent element.
    $element = parent::processWebformOther($element, $form_state, $complete_form);

    // Change the other text input to a text area.
    $element['other']['#type'] = 'textarea';

    return $element;
  }

}
