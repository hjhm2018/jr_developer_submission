<?php

$array = [8, 5, 6, 9, 3, 8, 2, 4, 6, 10, 8, 5, 6, 1, 7, 10, 5, 3, 7, 6];

// Create 2 arrays for the teams
$team_A = [];

$team_B = [];

// Sort the array

sort($array);

// Push values to the different arrays
for ($i = 0; $i < count($array); $i++) {

    // Even position numbers in the array will go to Team A and odd numbers to Team B 
    if ($i % 2 === 0) {
        array_push($team_A, $array[$i]);
    } else {
        array_push($team_B, $array[$i]);
    }
}

// This is the long way to show them on screen

// echo '<table style="text-align:center; border: 1px solid black; border-collapse: collapse; margin: 0 auto;">';

// echo '<tr style="border: 1px solid black; border-collapse: collapse"><th style="background: red; color: white; padding: 8px;">Team A</><th style="background: blue; color: white; padding: 8px;">Team B</th></tr>';

// for ($i = 0; $i < count($team_A); $i++) {
//     echo '<tr><td style="border: 1px solid black; border-collapse: collapse">' . $team_A[$i] . '</td><td style="border: 1px solid black; border-collapse: collapse">' .  $team_B[$i] . '</td></tr>';
// }

// echo '</table>';

// This is the best way

require './views/index.view.php';
