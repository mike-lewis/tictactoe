<?php

	$name = 'Mike';
	$what = 'geek';
	$level = 10;
	echo 'Hi, my name is ' . $name, ' , and I am a level ' . $what;
	
	//$hoursworked = $_GET['hours'];
	$rate = 12;
	//$total = $hoursworked * $rate;
	$position = $_GET['board'];
	//$squares = str_split($position);
	
	//if ($hoursworked > 40) {
	//	$total = $hoursworked * $rate * 1.5;
	//} else {
	//	$total = $hoursworked * $rate;
	//}
	//echo '<br/>';
	//echo ($total > 0) ? 'You owe me ' . $total : "You're welcome";

	echo '<br/>';
	
	// Game logic
	
	//if (winner('x', $squares)) echo 'You win.';
	//else if (winner('o', $squares)) echo 'I win.';
	//else echo 'No winner yet.';
	
	// OO Game logic
	$game = new Game($position);
	$game->display();
	if ($game->winner('x')) {
		echo 'You win. Lucky guesses!';
	} else if ($game->winner('o')) {
		echo 'I win. Muahahahha';
	} else {
		echo 'No winner yet, but you are losing.';
	}

		
	function winner($token, $position) {
		/*
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
		*/
		
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
	
	class Game {
		var $position;
		
		function __construct($squares) {
			$this->position = str_split($squares);
		}
		
		function winner($token) {
		
			$won = false;
			
			if (($this->position[0] == $token) && 
				($this->position[1] == $token) &&
				($this->position[2] == $token)) {
					$won = true;
			} else if (($this->position[3] == $token) &&
					   ($this->position[4] == $token) &&
					   ($this->position[5] == $token)) {
							$won = true;
			} else if (($this->position[6] == $token) &&
					   ($this->position[7] == $token) &&
					   ($this->position[8] == $token)) {
							$won = true;
			} else if (($this->position[0] == $token) &&
					   ($this->position[4] == $token) &&
					   ($this->position[7] == $token)) {
							$won = true;
			} else if (($this->position[2] == $token) &&
					   ($this->position[4] == $token) &&
					   ($this->position[6] == $token)) {
							$won = true;
			} else if (($this->position[0] == $token) &&
					   ($this->position[3] == $token) &&
					   ($this->position[6] == $token)) {
							$won = true;
			} else if (($this->position[0] == $token) &&
					   ($this->position[4] == $token) &&
					   ($this->position[8] == $token)) {
							$won = true;
			} else if (($this->position[2] == $token) &&
					   ($this->position[5] == $token) &&
					   ($this->position[8] == $token)) {
							$won = true;
			}
			
			return $won;
		}
		
		function display() {
			echo '<table cols="3" style="font-size:large; font-weight:bold">';
			echo '<tr>'; // open the first row
			for ($pos = 0; $pos < 9; $pos++) {
				echo $this->show_cell($pos);
				if ($pos % 3 == 2) echo '</tr><tr>'; // start a new row for the next square
			}
			echo '</tr>'; // close last row
			echo '</table>';
		}
		
		function show_cell($which) {
			$token = $this->position[$which];
			// deal with the easy case
			if ($token <> '-') return '<td>' . $token . '</td>';
			//now the hard case
			$this->newposition = $this->position; // copy original
			$this->newposition[$which] = 'o'; // their move
			$move = implode($this->newposition); //
			$link = '/?board=' . $move;
			return '<td><a href="' . $link . '">-</a></td>';
			
		}
	}
?>

<html>
	<head>
		<title>Tic tac toe</title>
		<style>canvas { width: 100%; height: 100% }</style>
	</head>
	<body>
	
	</body>
	
</html>