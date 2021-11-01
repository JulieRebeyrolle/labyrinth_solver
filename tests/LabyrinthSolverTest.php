<?php

use App\LabyrinthSolver;
use PHPUnit\Framework\TestCase;

class LabyrinthSolverTest extends TestCase
{
    public function testConnected()
    {
        $solver = new LabyrinthSolver();
        $this->assertEquals(1, $solver->isFree());
    }

}