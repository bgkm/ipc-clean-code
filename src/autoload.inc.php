<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'app\\entity\\birthday' => '/Entity/Birthday.php',
                'app\\entity\\friendentity' => '/Entity/FriendEntity.php',
                'app\\entity\\friendscollection' => '/Entity/FriendsCollection.php',
                'app\\service\\friendloaderfromcsv' => '/Service/FriendLoaderFromCsv.php',
                'app\\service\\friendloaderinterface' => '/Service/FriendLoaderInterface.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd