<?php

namespace App;

class LabyrinthSolver
{

    private array $map;
    private int $height;
    private int $width;
    private array $accessibleFromStart = [];

    public function isAccessible(int $height, int $width, array $map, int $posX, int $posY): bool
    {
        $this->map = $map;
        $this->height = $height;
        $this->width = $width;

        $accessibleCoords = $this->getAllAccessibleCoords();

        $this->isAccessibleFromStart($posY, $posX);

        return count($this->accessibleFromStart) === count($accessibleCoords) ? 1 : 0;
    }

    private function getAllAccessibleCoords(): array
    {
        $accessibleCoords = [];
        for($y = 0; $y < $this->height; $y++) {
            for($x = 0; $x < $this->width; $x++) {
                if($this->map[$y][$x] === ' ') {
                    $accessibleCoords[] = "$y-$x";
                }
            }
        }

        return $accessibleCoords;
    }

    private function isAccessibleFromStart(int $y, int $x): bool
    {
        if ($this->map[$y][$x] === 'X' || in_array("$y-$x", $this->accessibleFromStart)) {
            return false;
        }

        $this->accessibleFromStart[] = "$y-$x";

        if (
            isset($this->map[$y][$x - 1]) && $this->isAccessibleFromStart($y, $x - 1)
            || isset($this->map[$y][$x + 1]) && $this->isAccessibleFromStart($y, $x + 1)
            || isset($this->map[$y - 1][$x]) && $this->isAccessibleFromStart($y - 1, $x)
            || isset($this->map[$y + 1][$x]) && $this->isAccessibleFromStart($y + 1, $x)
            || isset($this->map[$y + 1][$x - 1]) && $this->isAccessibleFromStart($y + 1, $x - 1)
            || isset($this->map[$y + 1][$x + 1]) && $this->isAccessibleFromStart($y + 1, $x + 1)
            || isset($this->map[$y - 1][$x - 1]) && $this->isAccessibleFromStart($y - 1, $x - 1)
            || isset($this->map[$y - 1][$x + 1]) && $this->isAccessibleFromStart($y - 1, $x + 1)
        ) {
            return true;
        }

        return false;
    }
}