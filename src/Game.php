<?php declare(strict_types=1);

namespace Sharkodlak\GameOfLive;

class Game {
	const COUNT_REMAIN_ALIVE = 2;
	const COUNT_EVOLVE = 3;
	private $liveCells = [[]];

	function addLiveCell($x, $y) {
		$this->liveCells[$x][$y] = true;
	}

	function isAlive($x, $y) {
		return $this->liveCells[$x][$y] ?? false;
	}

	static private $neighboursOffset = [
		[-1,  1], [0,  1], [1,  1],
		[-1,  0],          [1,  0],
		[-1, -1], [0, -1], [1, -1]
	];

	private function getNeighboursCoords($x, $y) {
		$neighboursCoords = \array_map(function(array $offset) use ($x, $y) {
			return [$x + $offset[0], $y + $offset[1]];
		}, self::$neighboursOffset);

		$neighbours = \array_filter($this->liveCells, function($nx) use ($x) {

		});
		return $neighbours;
	}

	function neighboursCount($x, $y) {
		$neighbours = $this->getNeighbours($x, $y);
		return self::COUNT_REMAIN_ALIVE;
	}
}
