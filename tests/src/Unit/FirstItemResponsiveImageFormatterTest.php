<?php

/**
 * @file
 *
 * Contains \Drupal\Tests\cardinality_field_formatters\Unit\FirstItemResponsiveImageFormatterTest
 *
 * Inspired by https://docs.acquia.com/article/lesson-102-unit-testing
 */

namespace Drupal\Tests\cardinality_field_formatters\Unit;

use Drupal\Tests\UnitTestCase;

/**
 * Demonstrates how to write tests.
 *
 * @group cardinality_field_formatters
 */
class FirstItemResponsiveImageFormatterTest extends UnitTestCase {


  /**
   * @var \Drupal\cardinality_field_formatters\Plugin\Field\FieldFormatter\FirstItemResponsiveImageFormatter
   */
  public $CustomImageFormatter;

  public function setUp() {
    $this->CustomImageFormatter = new \Drupal\cardinality_field_formatters\Plugin\Field\FieldFormatter\FirstItemResponsiveImageFormatter();
  }

  /**
   * A simple test that tests our defaultSettings() function.
   */
  public function testdefaultSettings() {

    // Confirm that 0C = 32F.
    $testArray = ($this->CustomImageFormatter->defaultSettings());
    $lasttestArrayItem = array_pop($testArray);

    $this->assertEquals('first_item', $lasttestArrayItem);
  }


}