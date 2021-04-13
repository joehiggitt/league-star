<?php
	function swap($array, $x, $y)
	{
		$temp = $array[$x];
		$array[$x] = $array[$y];
		$array[$y] = $temp;
		return $array;
	}

	function generateFixtures($teams, $isHomeAway)
	{
		$numTeams = count($teams);
		if ($numTeams < 2)
		{
			return false;
		}

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

		// spread out home and away fixtures
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
				$fixtures[$i][0] = swap($fixtures[$i][0], 0, 1);
				$tempFixtures[$i] = $fixtures[$odd++];
			}
		}
		$fixtures = $tempFixtures;

		// randomly swap home and away teams
		for ($round = 0; $round < $numRounds; $round++)
		{
			for ($match = 0; $match < $matchPerRound; $match++)
			{
				if (random_int(0, 9) > 4)
				{
					$fixtures[$round][$match] = swap($fixtures[$round][$match], 0, 1);
				}
			}
		}

		// randomly swap matchdays
		for ($round1 = 0; $round1 < $numRounds; $round1++)
		{
			if (random_int(0, 9) > 4)
			{
				$round2 = -1;
				while (($round2 == -1) or ($round2 == $round1))
				{
					$round2 = random_int(0, $numRounds - 1);
				}
				$fixtures = swap($fixtures, $round1, $round2);
			}
		}

		if ($isHomeAway)
		{
			for ($round = 0; $round < $numRounds; $round++)
			{
				$newRound = array();
				for ($match = 0; $match < $matchPerRound; $match++)
				{
					// array_push($newRound, array());
					array_push($newRound, swap($fixtures[$round][$match], 0, 1));
				}
				array_push($fixtures, $newRound);
			}
		}

		if ($ghost)
		{
			for ($round = 0; $round < sizeof($fixtures); $round++)
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
				$fixtures[$i][$j][0] = $teams[$fixtures[$i][$j][0]];
				$fixtures[$i][$j][1] = $teams[$fixtures[$i][$j][1]];
			}
		}

		return $fixtures;
	}
?>

<?php
	// $teamList = array(
	// 	"West Brom",
	// 	"Wolves",
	// 	"Aston Villa",
	// 	"Birmingham",
	// 	"Coventry"
	// );

	// $fixtureList = generateFixtures($teamList, true);

	// if ($fixtureList != false)
	// {
	// 	for ($i = 0; $i < sizeof($fixtureList); $i++)
	// 	{
	// 		for ($j = 0; $j < sizeof($fixtureList[$i]); $j++)
	// 		{
	// 			echo($fixtureList[$i][$j][0] . " v " . $fixtureList[$i][$j][1] . "<br>");
	// 		}
	// 		echo("<br>");
	// 	}
	// }
?>
