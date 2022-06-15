<?php

namespace Drupal\test_task\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Test task routes.
 */
class TestTaskController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
