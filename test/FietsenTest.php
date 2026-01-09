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
        $result = $fiets->add($conn, 0, "", "", 0);
        
        // Assert (Controleren)
        $this->assertEquals(1, $result, "fiets toevoegen mislukt");
    }
}