<?php

// First Labour : Heracles vs Nemean Lion
// use your Figher class here

require "./src/Fighter.php";

$heracles = new Fighter("Héraclès", 20, 6);
$lion = new Fighter("Lion", 11, 13);

echo $heracles->getName() . " 💙 " . $heracles->getLife() . PHP_EOL;
echo $lion->getName() . " 💙 " . $lion->getLife() . PHP_EOL;

$round = 1;

while ($heracles->isAlive() && $lion->isAlive()) {
    echo "Round: #" . $round . PHP_EOL;
    echo $heracles->fight($lion) . PHP_EOL;
    if ($lion->isAlive()) {
        echo $lion->fight($heracles) . PHP_EOL;
    }
    $round++;
}

$winner = $heracles->isAlive() ? $heracles : $lion;
$looser = $heracles->isAlive() ? $lion : $heracles;

echo $looser->getName() . " is dead" . PHP_EOL;
echo $winner->getName() . " wins 💙 " . $winner->getLife(). PHP_EOL;