<?php
/**
 * @file HexCube.php
 * @author The Wass
 * @brief This file defines a coordinate system which creates a hex grid
 *
 * @version 1.0 - 2015-03-18
 * * Initial version
 */
namespace TheWass\Grid\Coordinates;

use TheWass\Grid\Coordinate;
/**
 * @class HexCube
 * @author The Wass
 * @brief Class which tessellates into a hex grid.
 * @description description
 * @property-read integer $x
 * @property-read integer $y
 * @property-read integer $z
 */
class HexCube extends Coordinate
{
    protected $x;
    protected $y;
    protected $z;
    
    public function __construct($x = null, $y = null, $z = null)
    {
        if ($x + $y + $z != 0) {
            throw new \InvalidArgumentException("($x, $y, $z) is not a valid HexCube Coordinate.");
        }
        parent::__construct($x, $y, $z);
    }

    public function calculateNeighbors()
    {
        return array(
            new HexCube($this->x + 1, $this->y - 1, $this->z),
            new HexCube($this->x - 1, $this->y + 1, $this->z),
            new HexCube($this->x, $this->y + 1, $this->z - 1),
            new HexCube($this->x, $this->y - 1, $this->z + 1),
            new HexCube($this->x - 1, $this->y, $this->z + 1),
            new HexCube($this->x + 1, $this->y, $this->z - 1)
        );
    }

    public function toAxial()
    {
        return new Axial($this->x, $this->y);
    }
}
