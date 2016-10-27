<?php

namespace Drupal\cardinality_field_formatters;

use Drupal\Core\Field\PluginSettingsInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FormatterInterface;

class CardinalityFieldFormattersFormElementValidation {
  
  /**
   *
   */

  function validateCardinalityConstraint (array &$element, FormStateInterface &$form_state) {

    $element_name = $element['#name'];
    $element_value = $element['#value'];
    $lower_limit = $element['#min'];

    $constrain_cardinality = $form_state->getValue(array('fields','field_test_number_field','settings_edit_form','third_party_settings','cardinality_field_formatters','constrain_cardinality'));

    if ($constrain_cardinality == "1") {
      if ($this->checkForBlank($element_value)) {
        $form_state->setErrorByName($element_name, t('"@name" must have a value.', array('@name' => $element['#title'])));
      }

      if ($this->belowLowerLimit($element_value, $lower_limit)) {
        $form_state->setErrorByName($element_name, t('"@name" must be greater than or equal to @lower_limit.', array(
          '@name' => $element['#title'],
          '@lower_limit' => $lower_limit
        )));
      }

    }

  }

  protected function belowLowerLimit($number_to_test, $lower_limit) {

    $number_to_test = intval($number_to_test);
    $lower_limit = intval($lower_limit);

    return ($number_to_test < $lower_limit) ? TRUE : FALSE;

  }

  protected function checkForBlank ($number_to_test) {

    return ($number_to_test == "") ? TRUE : FALSE;

  }

}