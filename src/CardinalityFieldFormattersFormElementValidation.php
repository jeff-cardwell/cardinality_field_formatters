<?php

namespace Drupal\cardinality_field_formatters;

use Drupal\Core\Form\FormStateInterface;

class CardinalityFieldFormattersFormElementValidation {




  /**
   *
   */
  function startIndexValidator(array &$element, FormStateInterface &$form_state) {

    $element_name = $element['#name'];
    $element_value = $element['#value'];
    $lower_limit = 0;

    if ($this->belowLowerLimit($element_value, $lower_limit)) {
      $form_state->setErrorByName($element_name, t('@name must be greater than or equal to @lower_limit.', array('@name' => $element['#title'], '@lower_limit' => $lower_limit)));
    }

  }

  /**
   *
   */
  function fieldCountValidator(array &$element, FormStateInterface &$form_state) {

    $element_name = $element['#name'];
    $element_value = $element['#value'];
    $lower_limit = 1;

    if ($this->belowLowerLimit($element_value, $lower_limit)) {
      $form_state->setErrorByName($element_name, t('@name must be greater than or equal to @lower_limit.', array('@name' => $element['#title'], '@lower_limit' => $lower_limit)));
    }

  }



  protected function belowLowerLimit($number_to_test, $lower_limit) {

    if ($number_to_test < $lower_limit) {
      return TRUE;
    }

    return FALSE;
  }



  protected function belowUpperBound() {

  }


}