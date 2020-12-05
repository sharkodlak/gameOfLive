<?php declare(strict_types=1);

namespace Sharkodlak\GameOfLive;

final class CoordinatesTest extends \PHPUnit\Framework\TestCase {
	public function testGetCoordinates() {
		$coord = new Coordinates(0, 0);
		$this->assertEquals([0, 0], $coord->getCoordinates());
	}

	public function testGetX() {
		$coord = new Coordinates(0, 0);
		$this->assertEquals(0, $coord->getX());
		$this->assertNotEquals(1, $coord->getX());
	}

	public function testGetY() {
		$coord = new Coordinates(0, 0);
		$this->assertEquals(0, $coord->getY());
		$this->assertNotEquals(1, $coord->getY());
	}

	public function testMove() {
		$coord = new Coordinates(1, 1);
		$shifted = $coord->move(2, 3);
		$this->assertEquals([3, 4], $shifted->getCoordinates());

		$evenMoreShifted = $shifted->move(...$coord);
		$this->assertEquals([4, 5], $evenMoreShifted->getCoordinates());

		$evenMoreShifted = $coord->move(...$shifted);
		$this->assertEquals([4, 5], $evenMoreShifted->getCoordinates());
	}
}
