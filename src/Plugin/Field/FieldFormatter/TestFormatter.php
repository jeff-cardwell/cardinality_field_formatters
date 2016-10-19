<?php

namespace Drupal\cardinality_field_formatters\Plugin\Field\FieldFormatter;

use Drupal\responsive_image\Plugin\Field\FieldFormatter\ResponsiveImageFormatter;


/**
 * @FieldFormatter(
 *   id = "test_responsive_image_formatter",
 *   label = @Translation("Responsive Image - Test"),
 *   description = @Translation("Show only the first image using Reponsive Image"),
 *   field_types = {
 *     "image"
 *   }
 * )
 */
class TestFormatter extends ResponsiveImageFormatter {

}