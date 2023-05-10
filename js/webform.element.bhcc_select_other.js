/**
 * @file
 * JavaScript behaviors for other elements.
 */
(function ($, Drupal, once) {

  'use strict';

  /**
   * Attach handlers to select other elements with other checkbox.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.bhcc_webform_select_other = {
    attach: function (context) {
      $(once('bhcc-webform-select-other', $(context).find('.js-bhcc-webform-select-other'))).each(function () {
        var $element = $(this);

        var $select = $element.find('select');
        var $input = $element.find('.js-webform-select-other-input');
        var $checkbox = $element.find('.js-bhcc-webform-select-other-checkbox__checkbox');
        var $otherOption = $select.find('option[value="_other_"]');

        // If the checkbox is not checked.
        if (!$checkbox.is(':checked')) {
          $otherOption.detach();
        }

        // When the checkbox changes...
        $checkbox.on('change', function () {
          // Set the select box to _other_ and trigger the selects change event.
          // Else reset it.
          // This triggers webforms own select other events.
          if (this.checked) {
            $select.append($otherOption)
             .val('_other_')
             .trigger('change');
          } else {
            $select.val('')
              .trigger('change');
            $otherOption.detach();
          }
        });

        // When the select changes to an option other than _other_
        // Uncheck the checkbox and remove it.
        // Don't trigger checkbox change event as that can cause a loop.
        $select.on('change', function () {
          if ($select.val() != '_other_') {
            $checkbox.prop('checked', false);
            $otherOption.detach();
          }
        });
      });
    }
  };

})(jQuery, Drupal, once);
