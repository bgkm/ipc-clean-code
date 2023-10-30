<?php declare(strict_types=1);

namespace App\Service;

use App\Entity\FriendsCollection;

interface FriendLoaderInterface
{
    public function loadFiends(): FriendsCollection;

}