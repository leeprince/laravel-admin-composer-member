<?php
/**
 * [ 路由 ]
 * 已在组件中定义路由前缀为： admin； 所以访问以下路径需要添加前缀 admin
 *
 * @Author  leeprince:2020-03-22 19:20
 */

Route::get('/test', function () {
    dd(config());
});
Route::resource('members', MemberController::class)->names('member');



