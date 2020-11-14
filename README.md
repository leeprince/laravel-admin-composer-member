# 基于laravel-admin的小程序会员系统

## 准备
1. 安装 laravel/laravel 
2. 安装 encore/laravel-admin

## 安装
1. 安装 leeprince/laravel-admin-member

    ```angular2
    composer require leeprince/laravel-admin-member
    ```

2. 发布配置

    ```angular2
    php artisan vendor:publish --provider="LeePrince\MinprogramMember\MemberServiceProvider"
    ```
3. 迁移文件
    ```angular2
    php artisan migrate
    ```
