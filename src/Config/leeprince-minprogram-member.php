<?php

/**
 *  配置文件
 *      是执行命令  php artisan vendor:publish --provider="LeePrince\MinprogramMember\MemberServiceProvider" 生成的配置文件
 */
return [
    /** 配置该组件包的命名空间 */
    'root' => [
        'namespace' => 'LeePrince\\MinprogramMember'
    ],
    /** 配置数据库连接 */
    'database' => [
        'connection' => [
            'default' => env('DB_CONNECTION', 'mysql'),
            // 默认连接的配置项合并到自定义的配置连接中，再用自定义的配置覆盖默认连接的配置项
            'customer' => 'member'
        ],
        'member' => [
            'prefix'  => 'admin_'
        ]
    ],
    /** 配置表名 */
    'table' => [
        'member' => 'member',
        'member_info' => 'member_info',
    ],
    /** 配置路由的控制器的根命名空间 */
    'route' => [
        'namespace' => 'LeePrince\\MinprogramMember\\Http\\Controllers'
    ],
];
