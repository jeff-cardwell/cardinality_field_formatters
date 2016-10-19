<?php

namespace Drupal\cardinality_field_formatters\Plugin\Field\FieldFormatter;

use Drupal\responsive_image\Plugin\Field\FieldFormatter\ResponsiveImageFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * @FieldFormatter(
 *   id = "first_item_responsive_image_formatter",
 *   label = @Translation("Responsive Image - First Item"),
 *   description = @Translation("Show only the first image using Reponsive Image"),
 *   field_types = {
 *     "image"
 *   }
 * )
 */


class FirstItemResponsiveImageFormatter extends ResponsiveImageFormatter {

  public static function defaultSettings() {
    return parent::defaultSettings() + array(
      'first_item' => '',
    );
  }

  public function settingsForm(array $form, FormStateInterface $form_state) {

    $elements= parent::settingsForm($form, $form_state);

    $elements['first_item'] = array(
      '#title' => t('Display only the first item'),
      '#type' => 'checkbox',
      '#default_value' => $this->getSetting('first_item'),
    );

    return $elements;
  }

  public function settingsSummary() {

    $summary = parent::settingsSummary();

    if ($this->getSetting('first_item')) {
      $summary[] = t('First Item Only');
    }

    return $summary;
  }

  public function viewElements(FieldItemListInterface $items, $langcode) {


    $elements = parent::viewElements($items, $langcode);

    if ($this->getSetting('first_item')) {
      $elements = array_slice($elements, 0, 1, TRUE);
    }

    return $elements;
  }



}