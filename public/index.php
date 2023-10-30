<?php declare(strict_types=1);

require_once '../src/FriendLoaderFromCsv.php';


$csv_file = '../data/friends.csv';
$friendsLoader = new \src\FriendLoaderFromCsv($csv_file);
$friendsCollection = $friendsLoader->loadFiends();

$compareTo = new DateTimeImmutable('11.9.2023');
$friendsWhichBirthday = [];

foreach($friendsCollection->friends as $friend) {
    if ($friend->dateOfBirth->isBirthday($compareTo)) {
        echo $friend." has birthday today\n";
        $friendsWhichBirthday[] = $friend;
    } else {
        echo $friend." has NOT birthday today\n";
    }
}

// send Friends with Birthday to Email Service
foreach($friendsWhichBirthday as $friend) {
    echo $friend;
}