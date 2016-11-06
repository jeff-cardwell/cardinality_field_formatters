<?php

namespace Drupal\cardinality_field_formatters;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Number;

class CardinalityFieldFormattersFormElementValidation {

  /**
   *
   */

  public function validateCardinalityConstraint (array $element, FormStateInterface &$form_state, $complete_form) {

    // #element that determines if we will validate
    $element_needed_to_choose_to_validate = $element['#cardinality_field_formatters_validation_determinator'];

    // value to determine if we validate
    $element_value_needed_to_choose_to_validate = $element['#cardinality_field_formatters_validation_determinator_true_value'];

    // get the array of parent indexes to current element, the element which is being validated
    // needed for form_state->getValue()
    $elements_parents_array = $element['#parents'];

    // substitutes the final #element with the #element that determines if we will validate
    // needed for form_state->getValue()
    $elements_parents_array[count($elements_parents_array)-1] = $element_needed_to_choose_to_validate;

    // gets form_state value of the #element that determines whether we will validate
    $validation_determinator_value = $form_state->getValue($elements_parents_array);

    if ($validation_determinator_value === $element_value_needed_to_choose_to_validate) {

      self::setFormStateErrorIfBlank($element, $form_state);
      Number::validateNumber($element, $form_state, $complete_form);
    }

  }

  protected static function setFormStateErrorIfBlank(array $element, FormStateInterface &$form_state){

    $form_element_name = $element['#name'];
    $form_element_title = $element['#title'];
    $form_element_value = $element['#value'];

    if (self::isBlankString($form_element_value)) {
      $form_state->setErrorByName($form_element_name, t('"@title" must have a value.',
        array(
          '@title' => $form_element_title
        )));
    }

  }


  protected static function isBlankString ($value_to_test) {

    return ($value_to_test === "") ? TRUE : FALSE;
  }

}