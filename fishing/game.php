<?php

class Game {
  public $gameID;
  public $targetScore;
  public $gameStatus;
  
  function __construct($targetScore, $gameStatus) {
    $this->targetScore = $targetScore;
	$this->gameStatus  = $gameStatus;
  }
  public function setGameWon($gameOutcome){
	  // update db game status and outcome
  }
}

class Fish {
  public $fishID;
  public $fishStrength;
  
  function __construct($fishID) {
    $this->fishID = $fishID;
  }
  public function getFishStrength(){
	 // gets fish strength from db for given fishID 
  }
}

class Player {
  public $lineStrength;
  public $lives;
  
  function __construct($lives) {
    $this->lives = $lives;
  }
  public function hunt(){
	// hunts, catches random fish
	$fishID       = rand(1,5);
	$lineStrength = rand(1,4); 	

	$fish = new fish(fishID);
	$sharkID = 5;
	
	if($fish->fishStrength <= $lineStrength && $fishID != $sharkID){
		$fishScore = $fishStrength; // fish score is a multiple of fish stregth
		$score += $fishScore;
		// updates db records: lives, score
	}else{
		$this->lives -= 1;
	}
  }
}
//##############################################
//               NEW GAME

$targetScore  = rand(10,40); // random value
$lives        = 3;

$game         = new Game($targetScore, 1);
$player       = new Player($lives);

$player->hunts();

if($player->lives == 0 ){
	// game over - lost
	$game->setGameWon(0);
}

if($player->score >= $game->targetScore ){
	// game over - won
	$game->setGameWon(1);	
}
