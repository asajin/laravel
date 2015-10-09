<?php

class Bowling
{
    private $framesScore = array();
    
    public function frame($a, $b)
    {
        $this->framesScore[] = array($a,$b);
    }
    
    public function result()
    {
        $sum = 0;
        
        foreach ($this->framesScore as $key => $frame)
        {
            $frameSum = $frame[0] + $frame[1];
            if($frameSum === 10) {
               $frameSum += $this->framesScore[$key +1][0]; 
            }
            $sum += $frameSum;
        }
        
        return $sum;
    }
}

class BowlingTest  extends TestCase
{
    public function testFirstFrame_8()
    {
        $game = new Bowling();
        
        $game->frame(6, 2);
        
        $result = $game->result();
        
        $this->assertEquals(8, $result);
    }
    
    public function testSecondFrame_11()
    {
        $game = new Bowling();
        
        $game->frame(6, 2);
        $game->frame(1, 2);
        
        $result = $game->result();
        
        $this->assertEquals(11, $result);
    }
    
    public function test_OneSpare_24()
    {
        $game = new Bowling();
        
        $game->frame(8, 2);
        $game->frame(6, 2);
        
        //spare
        
        $result = $game->result();
        
        $this->assertEquals(24, $result);
    }
    
    public function test_TwoSpare_42()
    {
        $game = new Bowling();
        
        $game->frame(8, 2);
        $game->frame(8, 2);
        $game->frame(6, 2);
        
        //spare
        
        $result = $game->result();
        
        $this->assertEquals(42, $result);
    }
}

