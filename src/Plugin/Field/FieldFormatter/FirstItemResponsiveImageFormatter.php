<?php

namespace Drupal\cardinality_field_formatters\Plugin\Field\FieldFormatter;

use Drupal\responsive_image\Plugin\Field\FieldFormatter\ResponsiveImageFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;


use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Utility\LinkGeneratorInterface;


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

  /**
   * @var EntityStorageInterface
   */
  protected $responsiveImageStyleStorage;

  /**
   * The image style entity storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $imageStyleStorage;

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * The link generator.
   *
   * @var \Drupal\Core\Utility\LinkGeneratorInterface
   */
  protected $linkGenerator;

  /**
   * Constructs a ResponsiveImageFormatter object.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
   * @param array $third_party_settings
   *   Any third party settings.
   * @param \Drupal\Core\Entity\EntityStorageInterface $responsive_image_style_storage
   *   The responsive image style storage.
   * @param \Drupal\Core\Entity\EntityStorageInterface $image_style_storage
   *   The image style storage.
   * @param \Drupal\Core\Utility\LinkGeneratorInterface $link_generator
   *   The link generator service.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user.
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings, EntityStorageInterface $responsive_image_style_storage, EntityStorageInterface $image_style_storage, LinkGeneratorInterface $link_generator, AccountInterface $current_user) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings, $responsive_image_style_storage, $image_style_storage, $link_generator, $current_user);

    $this->responsiveImageStyleStorage = $responsive_image_style_storage;
    $this->imageStyleStorage = $image_style_storage;
    $this->linkGenerator = $link_generator;
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('entity.manager')->getStorage('responsive_image_style'),
      $container->get('entity.manager')->getStorage('image_style'),
      $container->get('link_generator'),
      $container->get('current_user')
    );
  }

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