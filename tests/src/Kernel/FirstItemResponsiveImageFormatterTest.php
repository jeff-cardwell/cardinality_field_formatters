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
use Drupal\cardinality_field_formatters\Plugin\Field\FieldFormatter\FirstItemResponsiveImageFormatter;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Utility\LinkGeneratorInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * Demonstrates how to write tests.
 *
 * @group cardinality_field_formatters
 */
class FirstItemResponsiveImageFormatterTest extends UnitTestCase {


  /**
   * @var \Drupal\cardinality_field_formatters\Plugin\Field\FieldFormatter\FirstItemResponsiveImageFormatter;
   */

  public $mockFormatter;

  public $testFormatter;

  public function setUp() {

    //$this->testFormatter = new \Drupal\cardinality_field_formatters\Plugin\Field\FieldFormatter\FirstItemResponsiveImageFormatter();

    //$this->mockFormatter = $this->getMockBuilder('FirstItemResponsiveImageFormatter')
      //->setMethods(null)
      //->disableOriginalConstructor()
      //->getMock();

    //$mockFormatter->expects($this->any())->method('settingsSummary')
    //  ->willReturn([1 => 'first_item']);

    //$this->testFormatter = new FirstItemResponsiveImageFormatter();

    /*$stub = $this->getMockBuilder('ClassA')
      ->setMethods(array('getResultFromRemoteServer'))
      ->disableOriginalConstructor()
      ->getMock();
    $stub->expects($this->any())
      ->method('getResultFromRemoteServer')
      ->will($this->returnValue('Poodle'));
    $stub->__construct('dog52');*/

  }

  /**
   * A simple test that tests our defaultSettings() function.
   */
  //public function testdefaultSettings() {


    // Confirm that 0C = 32F.
    //$testArray = $this->mockFormatter->settingsSummary();
    //$lasttestArrayItem = array_pop($testArray);

    //$this->assertEquals('some_item', $lasttestArrayItem);

  //}


}