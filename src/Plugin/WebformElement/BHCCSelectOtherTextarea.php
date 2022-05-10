<?php

namespace Drupal\bhcc_webform_select_other\Plugin\WebformElement;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformElementOtherInterface;

/**
 * Provides a 'bhcc_select_other_textarea' element.
 *
 * @WebformElement(
 *   id = "bhcc_select_other_textarea",
 *   label = @Translation("BHCC Select other with Textarea"),
 *   description = @Translation("Implement the BHCC pattern for select other with a textarea...."),
 *   category = @Translation("Options elements"),
 * )
 */
class BHCCSelectOtherTextarea extends BHCCSelectOther implements WebformElementOtherInterface { }
