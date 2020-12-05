<?php declare(strict_types=1);

namespace Sharkodlak\GameOfLive;

class Coordinates
implements \IteratorAggregate {
	private $coordinates = [];

	public function __construct(int $x, int $y) {
		$this->coordinates[0] = $x;
		$this->coordinates[1] = $y;
	}

	public function getCoordinates(): array {
		return $this->coordinates;
	}

	public function getX(): int {
		return $this->coordinates[0];
	}

	public function getY(): int {
		return $this->coordinates[1];
	}

	public function move(...$coordinates): self {
		$coordinates = \array_map(static function($x, $diff): int {return $x + $diff;}, $this->coordinates, $coordinates);
		return new self(...$coordinates);
	}

	public function getIterator() {
		return new \ArrayIterator($this->coordinates);
	}
}
