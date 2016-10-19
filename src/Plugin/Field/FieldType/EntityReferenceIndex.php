<?php

namespace Drupal\cardinality_field_formatters\Plugin\Field\FieldType;

use Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Render\Element;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;



/**
* @FieldType(
*   id = "entity_reference_index",
*   label = @Translation("Entity reference index"),
*   description = @Translation("An entity field containing an entity reference with an index for display."),
*   category = @Translation("Reference"),
*   default_widget = "entity_reference_autocomplete",
*   default_formatter = "entity_reference_label",
*   list_class = "\Drupal\Core\Field\EntityReferenceFieldItemList",
* )
*/

class EntityReferenceIndex extends EntityReferenceItem {

  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = parent::propertyDefinitions($field_definition);
    $quantity_definition = DataDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('Quantity'))
      ->setRequired(TRUE);
    $properties['quantity'] = $quantity_definition;
    return $properties;
  }

  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = parent::schema($field_definition);
    $schema['columns']['quantity'] = array(
      'type' => 'int',
      'size' => 'tiny',
      'unsigned' => TRUE,
    );

    return $schema;
  }

}