<?php

use App\LabyrinthSolver;
use PHPUnit\Framework\TestCase;

class LabyrinthSolverTest extends TestCase
{
    public function testOneEmptySpace()
    {
        $height = 3;
        $width = 3;
        $posX = 1;
        $posY = 1;

        $map = [
            'XXX',
            'X X',
            'XXX',
        ];

        $solver = new LabyrinthSolver();
        $this->assertEquals(true, $solver->isAccessible($height, $width, $map, $posX, $posY));
    }

    public function testNoEmptySpace()
    {
        $height = 3;
        $width = 3;
        $posX = 1;
        $posY = 1;

        $map = [
            'XXX',
            'XXX',
            'XXX',
        ];

        $solver = new LabyrinthSolver();
        $this->assertEquals(true, $solver->isAccessible($height, $width, $map, $posX, $posY));
    }

    public function testAllFreeSpacesAccessible() {
        $height = 12;
        $width = 12;
        $posX = 6;
        $posY = 7;

        $map = [
            'XXXXXXXXXXXX',
            'XX X X  X  X',
            'XX        XX',
            'X  X     X X',
            'X          X',
            'X  X    XX X',
            'X  XX   XX X',
            'X          X',
            'XXXXXXX    X',
            'XXXXXX     X',
            'X       XXXX',
            'XXXXXXXXXXXX',
        ];

        $solver = new LabyrinthSolver();
        $this->assertEquals(true, $solver->isAccessible($height, $width, $map, $posX, $posY));
    }

    public function testAllFreeSpacesAccessibleDiagonals() {
        $height = 12;
        $width = 12;
        $posX = 6;
        $posY = 7;

        $map = [
            'XXXXXXXXXXXX',
            'XX X X  X  X',
            'XX X      XX',
            'X X      X X',
            'X          X',
            'X  X    XX X',
            'X  XX   XX X',
            'X          X',
            'XXXXXXX    X',
            'XXXXXX     X',
            'X       XXXX',
            'XXXXXXXXXXXX',
        ];

        $solver = new LabyrinthSolver();
        $this->assertEquals(true, $solver->isAccessible($height, $width, $map, $posX, $posY));
    }

    public function testNotAllFreeSpacesAccessible() {
        $height = 12;
        $width = 12;
        $posX = 6;
        $posY = 7;

        $map = [
            'XXXXXXXXXXXX',
            'XX XXX  X  X',
            'XX XX     XX',
            'XXXXX    X X',
            'X          X',
            'X  X    XX X',
            'X  XX   XX X',
            'X          X',
            'XXXXXXX    X',
            'XXXXXX     X',
            'X       XXXX',
            'XXXXXXXXXXXX',
        ];

        $solver = new LabyrinthSolver();
        $this->assertEquals(false, $solver->isAccessible($height, $width, $map, $posX, $posY));
    }
}