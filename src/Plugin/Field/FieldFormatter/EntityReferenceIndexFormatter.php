<?php

namespace Drupal\cardinality_field_formatters\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceLabelFormatter;
use Drupal\Core\Field\FieldItemListInterface;

/**
* @FieldFormatter(
*   id = "entity_reference_index_view",
*   label = @Translation("Entity label and quantity"),
*   description = @Translation("Display the referenced entities’ label with their index."),
*   field_types = {
*     "entity_reference_index"
*   }
* )
*/
class EntityReferenceIndexFormatter extends EntityReferenceLabelFormatter {

  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = parent::viewElements($items, $langcode);
    $values = $items->getValue();

      foreach ($elements as $delta => $entity) {
        $elements[$delta]['#suffix'] = ' x' . $values[$delta]['quantity'];
      }

    return $elements;
    }
}
