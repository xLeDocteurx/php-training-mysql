<?php
    require "./read.php";

    class Test extends \PHPUnit\Framework\TestCase {
        
        public function test_read() {
            $this->assertEquals(1,1);
        }
    } 
?>