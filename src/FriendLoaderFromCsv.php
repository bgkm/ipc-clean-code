<?php declare(strict_types=1);

namespace src;

require_once 'Birthday.php';
require_once 'FriendLoaderInterface.php';
require_once 'FriendEntity.php';
require_once 'FriendsCollection.php';

class FriendLoaderFromCsv implements FriendLoaderInterface
{
    private string $csvPath;
    private bool $ignoreFirstRow;

    public function __construct(string $csvPath, bool $ignoreFirstRow = true) {
        $this->csvPath = $csvPath;
        $this->ignoreFirstRow = $ignoreFirstRow;
    }

    public function loadFiends(): FriendsCollection
    {
        $friends = [];

        $data = array_map('str_getcsv', file($this->csvPath));
        if ($this->ignoreFirstRow) $data = array_slice($data, 1);
        foreach ($data as $row) {
            $row = array_map('trim', $row);
            $friends[] = new FriendEntity($row[0], $row[1], new \DateTimeImmutable($row[2]), $row[3]);
        }

        return new FriendsCollection(... $friends);
    }
}