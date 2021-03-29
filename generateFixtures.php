<?php
	function swap($array)
	{
		$temp = $array[0];
		$array[0] = $array[1];
		$array[1] = $temp;
		return $array;
	}

	if (isset($_POST['submit']))
	{
		$numTeams = $_POST['numTeams'];
		if ($numTeams < 2)
		{
			echo('Need at least 2 teams.');
		}
		else
		{
			$ghost = false;
			if ($numTeams % 2 == 1)
			{
				$numTeams++;
				$ghost = true;
			}

			$numRounds = $numTeams - 1;
			$matchPerRound = $numTeams / 2;
			$fixtures = array();

			for ($round = 0; $round < $numRounds; $round++)
			{
				array_push($fixtures, array());
				for ($match = 0; $match < $matchPerRound; $match++)
				{
					$homeID = ($round + $match) % ($numTeams - 1);
					$awayID = ($numTeams - 1 - $match + $round) % ($numTeams - 1);
					if ($match == 0)
					{
						$awayID = ($numTeams - 1);
					}
					array_push($fixtures[$round], array());
					array_push($fixtures[$round][$match], $homeID);
					array_push($fixtures[$round][$match], $awayID);
				}
			}

			$even = 0;
			$odd = ($numTeams / 2);
			$tempFixtures = array();
			for ($i = 0; $i < $numRounds; $i++)
			{
				array_push($tempFixtures, array());
				if ($i % 2 == 0)
				{
					$tempFixtures[$i] = $fixtures[$even++];
				}
				else
				{
					$fixtures[$i][0] = swap($fixtures[$i][0]);
					$tempFixtures[$i] = $fixtures[$odd++];
				}
			}
			$fixtures = $tempFixtures;

			for ($round = 0; $round < $numRounds; $round++)
			{
				for ($match = 0; $match < $matchPerRound; $match++)
				{
					if (random_int(0, 9) > 4)
					{
						$fixtures[$round][$match] = swap($fixtures[$round][$match]);
					}
				}
			}

			if ($ghost == true)
			{
				for ($round = 0; $round < $numRounds; $round++)
				{
					for ($match = 0; $match < $matchPerRound; $match++)
					{
						if (($fixtures[$round][$match][0] == ($numTeams - 1)) or ($fixtures[$round][$match][1] == ($numTeams - 1)))
						{
							unset($fixtures[$round][$match]);
							$fixtures[$round] = array_values($fixtures[$round]);
							break;
						}
					}
				}
			}

			for ($i = 0; $i < sizeof($fixtures); $i++)
			{
				for ($j = 0; $j < sizeof($fixtures[$i]); $j++)
				{
					echo("Team " . ($fixtures[$i][$j][0] + 1) . " v Team " . ($fixtures[$i][$j][1] + 1) . "<br>");
				}
				echo("<br>");
			}
		}
		
	}
?>
<?php
	$form = 
	'<form method="post">
		Number of teams&emsp;<input type="number" name="numTeams" required><br>
		<input type="submit" name="submit" value="Submit"/>
	</form>';
	echo($form);
?>
