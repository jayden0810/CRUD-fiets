<?php

use PHPUnit\Framework\TestCase;
use Project_fiets\Classes\Fiets;

//  FietsTest.php

class FietsenTest extends TestCase
{
    public function testadd()
    {
        // Arrange (Voorbereiden)
        $fiets = new Fiets();
        
        // Act (Uitvoeren)
        $result = $fiets->add($this->conn, 100, "kaas", "Stadsfiets", 5);
        
        // Assert (Controleren)
        $this->assertTrue($result);
    }
}
