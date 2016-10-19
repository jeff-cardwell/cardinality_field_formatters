<?php

namespace Drupal\cardinality_field_formatters\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Plugin\Field\FieldWidget\EntityReferenceAutocompleteWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
* @FieldWidget(
*   id = "entity_reference_autocomplete_index",
*   label = @Translation("Autocomplete w/Index"),
*   description = @Translation("An autocomplete text field with an associated index."),
*   field_types = {
*     "entity_reference_index"
*   }
* )
*/
class EntityReferenceIndexWidget extends EntityReferenceAutocompleteWidget {

  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $widget = parent::formElement($items, $delta, $element, $form, $form_state);

    $widget['quantity'] = array(
      '#title' => $this->t('Quantity'),
      '#type' => 'number',
      '#default_value' => isset($items[$delta]) ? $items[$delta]->quantity : 1,
      '#min' => 1,
      '#weight' => 10,
    );

  return $widget;
  }
}