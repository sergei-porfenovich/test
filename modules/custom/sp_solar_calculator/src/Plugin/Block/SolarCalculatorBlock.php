<?php
/**
 * @file
 * Contains \Drupal\sp_solar_calculator\Plugin\Block\XaiBlock.
 */
namespace Drupal\sp_solar_calculator\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Solar Calculator' block.
 *
 * @Block(
 *   id = "sp_solar_calculator",
 *   admin_label = @Translation("Solar Calculator"),
 *   category = @Translation("Solar Calculator")
 * )
 */

class SolarCalculatorBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#attached' => array(
        'library' => array(
          'sp_solar_calculator/solar-calculator',
        ),
      ),
    );
  }
}
