<?php

namespace Drupal\cardinality_field_formatters;

use Drupal\Core\Form\FormStateInterface;

class CardinalityFieldFormattersFormElementValidation {
  
  /**
   *
   */

  function validateCardinalityConstraint (array &$element, FormStateInterface &$form_state) {

    $element_name = $element['#name'];
    $element_title = $element['#title'];
    $element_value = $element['#value'];

    // minimum numeric value allowed
    $lower_limit = $element['#min'];

    // gets the index of the sibling #element that will provide the value used to
    // determine if we will validate
    $element_needed_to_choose_to_validate = $element['#element_needed_for_element_validate'];

    // gets the necessary value to determine if we validate
    $element_value_needed_to_choose_to_validate = $element['#element_value_needed_for_element_validate'];



    // get the array of parent indexes to current element, which is the element #validate_element is called from
    $elements_parents_array = $element['#parents'];

    // uses the array of parent indexes and substitutes the final #element with the #element that is providing
    // the value that determines whether we will validate
    $elements_parents_array[count($elements_parents_array)-1] = $element_needed_to_choose_to_validate;

    // gets value of the #element from current form_state that determines whether we will validate
    $validation_determinator_value = $form_state->getValue($elements_parents_array);

    if ($validation_determinator_value == $element_value_needed_to_choose_to_validate) {
      if ($this->valueIsBlankString($element_value)) {
        $form_state->setErrorByName($element_name, t('"@title" must have a value.',
          array(
          '@title' => $element_title
        )));
      }

      if ($this->belowLowerLimit($element_value, $lower_limit)) {
        $form_state->setErrorByName($element_name, t('"@title" must be greater than or equal to @lower_limit.',
          array(
          '@title' => $element_title,
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

  protected function valueIsBlankString ($value_to_test) {

    return ($value_to_test == "") ? TRUE : FALSE;

  }

}