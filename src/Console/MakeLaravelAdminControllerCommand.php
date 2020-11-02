<?php
/**
 * [创建控制器的命令]
 *
 * @Author  leeprince:2020-03-25 02:10
 */

namespace LeePrince\MinprogramMember\Console;

use Encore\Admin\Console\MakeCommand;
use Illuminate\Support\Str;

/**
 * [Description]
 *
 * @Author  leeprince:2020-07-16 23:35
 * @package LeePrince\MinprogramMember\Console
 */
class MakeLaravelAdminControllerCommand extends MakeCommand
{
    /**
     * 控制台命令名称
     *  注意：关于命令的变量说明
     *      - 在使用 $name 变量设置控制台命令的名称(无签名)时不需要需要在 prince-make:controller-wechat 后面加上替换参数 {name}。
     *      - 在使用 $signature 变量设置控制台命令的名称和签名时需要在 prince-make:controller-wechat 后面加上替换参数 {name}，否则报错： Too many arguments, expected arguments "command".
     *      - $signature 的优先级大于 $name
     *      - 源码：Illuminate\Console\Command
     *          if (! isset($this->signature)) {
     *              $this->specifyParameters();
     *          }
     *
     * @var string
     */
    // protected $name = 'prince-make:controller-admin-member';
    
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'prince-make:controller-admin-member {name}
        {--model=}
        {--title=}
        {--stub= : Path to the custom stub file. }
        {--namespace=}
        {--O|output}';
    
    // 控制台命令的描述
    protected $description = '创建 leeprince/laravel-admin-minprogram-member composer 组件包中基于 laravel-admin 的控制器。
        php artisan prince-make:controller-minnprogram-member 控制器名 [--model=已存在的组件包Model(包含命名空间的 model)]
        实例: php artisan prince-make:controller-minnprogram-member  MemberController --model=LeePrince\\MinprogramMember\\Models\\Member';
    
    public function handle()
    {
        parent::handle();
    }
    
    /**
     * [该组件包根命名空间]
     *
     * @return \Illuminate\Config\Repository|mixed|string
     */
    protected function rootNamespace()
    {
        // 以下三种访问配置项都可以。具体区别看：MemberServiceProvider.php 中的介绍
        // return config('leeprince-minprogram-member.root.namespace');
        // return config('prince.member.root.namespace');
        return config('proot.namespace');
    }
    
    /**
     * 获取目标类的命名空间。默认或者命令行传参的命名空间
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        if ($namespace = $this->option('namespace')) {
            return $namespace;
        }
        
        return config('proute.namespace');
    }
    
    /**
     * 获取目标类路径。
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
    
        return __DIR__.'/../'.str_replace('\\', '/', $name).'.php';
    }
    
    /**
     * [创建控制成功后的提示字符串]
     *
     * @param string $string
     * @param null   $verbosity
     */
    public function comment($string, $verbosity = NULL)
    {
        parent::comment('你可以添加新的路由到两个文件中： ');
        parent::comment("\t1. laravel-admin 官方指定的路由文件 app/Admin/routes.php");
        parent::comment("\t2. 该命令的组件包的路由文件：./vendor/leeprince/laravel-admin-member/src/Route/route.php");
        parent::comment("\t建议：应用扩展开发基于第一种；组件开发使用第二种；");
        $this->line('');
        $this->info('新的路由为:');
    }
}