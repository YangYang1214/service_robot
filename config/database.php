<?php
if (!in_array($runtime = env('RUN_TIME', 'there is no RUN_TIME'), ['local', 'dev', 'test', 'uat', 'onl'])) {
    return [];
}
//$runtime = 'test';

$mysqlCommon = [
    'driver'      => 'mysql',
    //'database'    => 'serviceplat',
    'port'        => '3306',
    'unix_socket' => env('DB_SOCKET', ''),
    'charset'     => 'utf8mb4',
    'collation'   => 'utf8mb4_unicode_ci',
    'prefix'      => '',
    'strict'      => false,
    'engine'      => null,
];

$mysql       = [
    'local' => [
        'host'     => env('MYSQL_HOST'),
        'username' => env('MYSQL_USER'),
        'password' => env('MYSQL_PASSWORD'),
    ],
    'dev'   => [
        'host'     => 'dev.db.sunmi.com',
        'username' => 'kingshardadmin',
        'password' => 'Kwbd7246005c039789d9',
    ],
    'test'  => [
        'host'     => 'test.db.sunmi.com',
        'username' => 'kingshardadmin',
        'password' => 'Kwbd7246005c039789d9',
    ],
    'uat'   => [
        'host'     => 'uat.db.sunmi.com',
        'username' => 'kingshardadmin',
        'password' => 'Kwbd7246005c039789d9',
    ],
    'onl'   => [
        'host'     => 'kingshard.server.sunmi.com',
        'username' => 'adminkingshard',
        'password' => 'king87fcb63e80255801d0',
    ],
];

$serviceplat = array_merge($mysqlCommon, $mysql[$runtime], ['database' => 'serviceplat']);
$misun       = array_merge($mysqlCommon, $mysql[$runtime], ['database' => 'misun']);
$locationtools    = array_merge($mysqlCommon, $mysql[$runtime], ['database' => 'locationtools']);
$manage      = array_merge($mysqlCommon, $mysql[$runtime], ['database' => 'manage']);
$partners    = array_merge($mysqlCommon, $mysql[$runtime], ['database' => 'partners']);
$ota         = array_merge($mysqlCommon, $mysql[$runtime], ['database' => 'ota']);

//merchant库单独迁出 db主机地址改了
if ($runtime == 'uat')
{
    $merchant    = array_merge($mysqlCommon,array_merge($mysql[$runtime], ['host' => 'uat.merchant.sunmi.com']), ['database' => 'merchant']);
}
else if ($runtime == 'onl')
{
    $merchant    = array_merge($mysqlCommon,array_merge($mysql[$runtime], ['host' => 'merchant.db.sunmi.com']), ['database' => 'merchant']);
}
else
{
    $merchant    = array_merge($mysqlCommon,$mysql[$runtime], ['database' => 'merchant']);
}

$other = array_merge($mysqlCommon, $mysql[$runtime], ['database' => 'other']);
$repairManage = array_merge($mysqlCommon, $mysql[$runtime], ['database' => 'repair_manage']);



## redis
$redis = [
    'local' => [
        'client' => 'predis',

        'default' => [
            'host' => 'test.redis.sunmi.com',
            'password' => md5('testsunmiredis666'),
            'port' => 31379,
            'database' => 24,
        ],

        'phone_code' => [
            'host' => 'test.redis.sunmi.com',
            'password' => md5('testsunmiredis666'),
            'port' => 31379,
            'database' => 3,
        ],
    ],

    'dev' => [
        'client' => 'phpredis',

        'default' => [
            'host' => 'dev.redis.sunmi.com',
            'password' => md5('devsunmiredis666'),
            'port' => 31379,
            'database' => 24,
        ],

        'phone_code' => [
            'host' => 'dev.redis.sunmi.com',
            'password' => md5('devsunmiredis666'),
            'port' => 31379,
            'database' => 3,
        ],

        //合作伙伴平台相关redis配置
        'partner_admin' => [
            'host' => 'dev.redis.sunmi.com',
            'password' => md5('devsunmiredis666'),
            'port' => 31379,
            'database' => 24,
        ],

        'partner_developers_login' => [
            'host' => 'dev.redis.sunmi.com',
            'password' => md5('devsunmiredis666'),
            'port' => 31379,
            'database' => 2,
        ],

        'partner_developers_only' => [
            'host' => 'dev.redis.sunmi.com',
            'password' => md5('devsunmiredis666'),
            'port' => 31379,
            'database' => 1,
        ],
    ],

    'test' => [
        'client' => 'phpredis',

        'default' => [
            'host' => 'test.redis.sunmi.com',
            'password' => md5('testsunmiredis666'),
            'port' => 31379,
            'database' => 24,
        ],

        'phone_code' => [
            'host' => 'test.redis.sunmi.com',
            'password' => md5('testsunmiredis666'),
            'port' => 31379,
            'database' => 3,
        ],

        //合作伙伴平台相关redis配置
        'partner_admin' => [
            'host' => 'test.redis.sunmi.com',
            'password' => md5('testsunmiredis666'),
            'port' => 31379,
            'database' => 24,
        ],

        'partner_developers_login' => [
            'host' => 'test.redis.sunmi.com',
            'password' => md5('testsunmiredis666'),
            'port' => 31379,
            'database' => 2,
        ],

        'partner_developers_only' => [
            'host' => 'test.redis.sunmi.com',
            'password' => md5('testsunmiredis666'),
            'port' => 31379,
            'database' => 1,
        ],
    ],


    'uat' => [
        'client' => 'phpredis',

        'default' => [
            'host' => 'r-bp1ca9057fcfe174.redis.rds.aliyuncs.com',
            'password' => 'qP4OFxigFSSDuSGfUCfM5H3B226Of8',
            'port' => 6379,
            'database' => 24,
        ],

        'phone_code' => [
            'host' => 'r-bp1ca9057fcfe174.redis.rds.aliyuncs.com',
            'password' => 'qP4OFxigFSSDuSGfUCfM5H3B226Of8',
            'port' => 6379,
            'database' => 3,
        ],

        //合作伙伴平台相关redis配置
        'partner_admin' => [
            'host' => 'r-bp1ca9057fcfe174.redis.rds.aliyuncs.com',
            'password' => 'qP4OFxigFSSDuSGfUCfM5H3B226Of8',
            'port' => 6379,
            'database' => 24,
        ],

        'partner_developers_login' => [
            'host' => 'r-bp1ca9057fcfe174.redis.rds.aliyuncs.com',
            'password' => 'qP4OFxigFSSDuSGfUCfM5H3B226Of8',
            'port' => 6379,
            'database' => 2,
        ],

        'partner_developers_only' => [
            'host' => 'r-bp1ca9057fcfe174.redis.rds.aliyuncs.com',
            'password' => 'qP4OFxigFSSDuSGfUCfM5H3B226Of8',
            'port' => 6379,
            'database' => 1,
        ],
    ],


    'onl' => [
        'client' => 'phpredis',

        'default' => [
            'host' => 'r-bp1a1b62cf6e7ad4.redis.rds.aliyuncs.com',
            'password' => 'Df29a00463943b0cc50790226f03',
            'port' => 6379,
            'database' => 24,
        ],

        'phone_code' => [
            'host' => 'r-bp1a1b62cf6e7ad4.redis.rds.aliyuncs.com',
            'password' => 'Df29a00463943b0cc50790226f03',
            'port' => 6379,
            'database' => 3,
        ],

        //合作伙伴平台相关redis配置
        'partner_admin' => [
            'host' => 'r-bp1a1b62cf6e7ad4.redis.rds.aliyuncs.com',
            'password' => 'Df29a00463943b0cc50790226f03',
            'port' => 6379,
            'database' => 24,
        ],

        'partner_developers_login' => [
            'host' => 'r-bp1a1b62cf6e7ad4.redis.rds.aliyuncs.com',
            'password' => 'Df29a00463943b0cc50790226f03',
            'port' => 6379,
            'database' => 2,
        ],

        'partner_developers_only' => [
            'host' => 'r-bp1a1b62cf6e7ad4.redis.rds.aliyuncs.com',
            'password' => 'Df29a00463943b0cc50790226f03',
            'port' => 6379,
            'database' => 1,
        ],

    ],
];



return [
    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */
    'default'     => env('DB_CONNECTION', 'serviceplat'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */
    'connections' => [
        'serviceplat' => $serviceplat, // 默认数据库
        'misun'       => $misun,
        'manage'      => $manage,
        'mysql' => $serviceplat, // 默认数据库
        'locationtools' => $locationtools,
        'partners' => $partners,
        'ota'      => $ota,
        'merchant' => $merchant,
        'other' => $other,
        'repair_manage' => $repairManage,
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */
    'migrations'  => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => $redis[$runtime],
];
