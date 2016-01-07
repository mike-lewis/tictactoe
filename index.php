<?php

	require_once('Game.php');

	
	$name = 'Mike';
	$what = 'geek';
	$level = 10;
	echo 'Hi, my name is ' . $name, ' , and I am a level ' . $level . ' ' . $what;
	
	// --- This is code is from the beginning of the tutorial, left commented for reference ---
	
	//$hoursworked = $_GET['hours'];
	//$rate = 12;
	//$total = $hoursworked * $rate;
	//$position = $_GET['board'];
	//$squares = str_split($position);
	
	//if ($hoursworked > 40) {
	//	$total = $hoursworked * $rate * 1.5;
	//} else {
	//	$total = $hoursworked * $rate;
	//}
	//echo '<br/>';
	//echo ($total > 0) ? 'You owe me ' . $total : "You're welcome";

	echo '<br/>';
	
	// --- Old game logic ---
	
	//if (winner('x', $squares)) echo 'You win.';
	//else if (winner('o', $squares)) echo 'I win.';
	//else echo 'No winner yet.';
	
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

		
		/*
		$result = true;
		for ($row = 0; $row < 3; $row++) {
			
			for ($col = 0; $col < 3; $col++) {
				if ($position[3 * $row + $col] != $token) {
					$result = false;	
					break;
				}
			}
		}
		
		if($result) {
			return $result;
		}
		for ($col = 0; $col < 3; $col++) {
			
			for ($row = 0; $row < 3; $row++) {
				if ($position[3 * $row + $col] != $token) {
					$result = false;	
					break;
				}
			}
		}
		
		if($result) {
			return $result;
		}
		
		return $result;
		*/
		
		//return $won;
	}
	
	
?>