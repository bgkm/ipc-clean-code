<?php declare(strict_types=1);

use App\Service\FriendLoaderFromCsv;

require_once 'autoload.inc.php';

$csv_file = '../data/friends.csv';
$friendsLoader = new FriendLoaderFromCsv($csv_file);
$friendsCollection = $friendsLoader->loadFiends();

$compareTo = new DateTimeImmutable('11.9.2023');
$friendsWhichBirthday = [];

echo "Today is ".$compareTo->format('Y-m-d')."\n";

echo "\nCheck birthdays:\n";
foreach($friendsCollection->friends as $friend) {
    if ($friend->dateOfBirth->isBirthday($compareTo)) {
        echo "* ".$friend." has birthday today\n";
        $friendsWhichBirthday[] = $friend;
    } else {
        echo "* ".$friend." has NOT birthday today\n";
    }
}

echo "\nSend Birthday Greetings to:\n";
// send Friends with Birthday to Email Service
foreach($friendsWhichBirthday as $friend) {
    echo "* ".$friend."\n";
}
