<?php

require_once basename(__DIR__) . '/../vendor/autoload.php';
require_once basename(__DIR__) . '/../src/Math.php';

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase {

  /**
   * @var Math
   */
  private $mathObj;

  /**
   * @dataProvider mathSumProvider
   */
  public function testMathSum($a, $b, $c) {
    $this->assertEquals($a, $this->mathObj->sum($b, $c));
  } 

  /**
   * @dataProvider mathMulProvider() : array
   */
  public function testMathMul($a, $b, $c) {
    $this->assertEquals($a, $this->mathObj->mul($b, $c));
  }

  public function mathMulProvider(): array {
    return [
      [4, 2, 2],
      [9, 3, 3],
    ];
  }

  public function mathSumProvider() : array {
    return [
      [4, 2, 2],
      [6, 3, 3],
      [5, 2, 3],
      [8, 4, 4],
    ];
  }

  protected function setUp() : void {
    $this->mathObj = new Math();
  }
}

