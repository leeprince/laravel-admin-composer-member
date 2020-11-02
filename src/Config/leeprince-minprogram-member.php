<?php

/**
 *  配置文件
 *      是执行命令  php artisan vendor:publish --provider="LeePrince\MinprogramMember\MemberServiceProvider" 生成的配置文件
 */
return [
    'table' => [
        'member' => 'admin_member',
        'member_info' => 'admin_member_info',
    ],
    'route' => [
        'namespace' => 'LeePrince\\MinprogramMember\\Http\\Controllers'
    ],
    'root' => [
        'namespace' => 'LeePrince\\MinprogramMember'
    ]
];
