<?php

namespace Drupal\Tests\bda_hello\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Verify that the Views are accessible.
 *
 * @ingroup rest_example
 * @group rest_example
 * @group examples
 */
class APIResponceTest extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['bda_hello'];

  public function setUp() {
    parent::setup();
  }

}

