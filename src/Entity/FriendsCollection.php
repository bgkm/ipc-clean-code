<?php declare(strict_types=1);

namespace App\Entity;

use App\Entity\FriendEntity as Friend;

readonly class FriendsCollection
{
    /**
     * @var array<Friend>
     */
    public array $friends;

    public function __construct(Friend ... $friends)
    {
        $this->friends = $friends;
    }

}