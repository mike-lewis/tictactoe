<?php

	require_once('Game.php');

	$name = 'Mike';
	$what = 'geek';
	$level = 10;
	echo 'Hi, my name is ' . $name, ' , and I am a level ' . $level . ' ' . $what;

	echo '<br/>';
	
	// --- New game logic ---
	
	// Start the game with the board set up as it is in the url
	$game = new Game($_GET['board']);
	
	// The game starts off 'playing'
	$playing_game = true;
	
	// While nobody has won, keep choosing moves
	while($playing_game) {
		
		// The 'computer' picks a move
		$game->pick_move();
		// Display the current board
		$game->display();
		
		// If there is a winner of the game, end the loop
		if ($game->winner('x')) {
			echo 'You win. Lucky guesses!';
			$playing_game = false;
		} else if ($game->winner('o')) {
			echo 'I win. Muahahahha';
			$playing_game = false;
		} else {
			echo 'No winner yet, but you are losing.';
			$playing_game = false;
		}
	}

	// Original winner function, no longer used, with other instructor provided code commented out
	function winner($token, $position) {

		$won = false;
		
		if (($position[0] == $token) && 
		    ($position[1] == $token) &&
			($position[2] == $token)) {
				$won = true;
		} else if (($position[3] == $token) &&
		           ($position[4] == $token) &&
				   ($position[5] == $token)) {
						$won = true;
		} else if (($position[6] == $token) &&
		           ($position[7] == $token) &&
				   ($position[8] == $token)) {
						$won = true;
		} else if (($position[0] == $token) &&
		           ($position[4] == $token) &&
				   ($position[7] == $token)) {
						$won = true;
		} else if (($position[2] == $token) &&
		           ($position[4] == $token) &&
				   ($position[6] == $token)) {
						$won = true;
		} else if (($position[0] == $token) &&
		           ($position[3] == $token) &&
				   ($position[6] == $token)) {
						$won = true;
		} else if (($position[1] == $token) &&
		           ($position[4] == $token) &&
				   ($position[7] == $token)) {
						$won = true;
		} else if (($position[2] == $token) &&
		           ($position[5] == $token) &&
				   ($position[8] == $token)) {
						$won = true;
		}
	
?>
