<?php declare(strict_types=1);

namespace Sharkodlak\GameOfLive;

final class GameTest extends \PHPUnit\Framework\TestCase {
	/*
	Plocha světa je nekonečná dvourozměrná mřížka obsahující buňky
	Každá z buněk má 8 sousedů
	Buňka je v jednom ze stavů: mrtvá nebo živá
	Buňky mění stav po každém kroku a všechny v jeden okamžik
	Stav buňky v dalším kroku je určen stavy jejích sousedů

	Každá živá buňka s méně než dvěma živými sousedy zemře.
	Každá živá buňka se dvěma nebo třemi živými sousedy zůstává žít.
	Každá živá buňka s více než třemi živými sousedy zemře.
	Každá mrtvá buňka s právě třemi živými sousedy oživne.

	*/

	public function testInit() {
		$coordinates = [0, 0];
		$otherCoordinates = [1, 1];

		$game = new Game();
		$game->addLiveCell(...$coordinates);
		$this->assertTrue($game->isAlive(...$coordinates));
		$this->assertFalse($game->isAlive(...$otherCoordinates));
	}

	public function testNeighboursCoords() {
		$coordinates = [3, 3];
		$neighbours = [
			[2, 4], [3, 4], [4, 4],
			[2, 3],         [4, 3],
			[2, 2], [3, 2], [4, 2]
		];

		$game = new Game();
		$game->addLiveCell(...$coordinates);
		$this->assertEquals($neighbours, $game->getNeighboursCoords(...$coordinates));
	}

	public function testIsAlive() {
		$coordinates = [0, 0];
		$coordinatesLeft = [-1, 0];
		$coordinatesRight = [1, 0];
		$coordinatesUp = [0, 1];

		$game = new Game();
		$game->addLiveCell(...$coordinates);
		$game->addLiveCell(...$coordinatesLeft);
		$game->addLiveCell(...$coordinatesRight);
		$this->assertEquals(2, $game->neighboursCount(...$coordinates));

		$game->addLiveCell(...$coordinatesUp);
		$this->assertEquals(3, $game->neighboursCount(...$coordinates));
	}

	//public function testEvolve()
}
