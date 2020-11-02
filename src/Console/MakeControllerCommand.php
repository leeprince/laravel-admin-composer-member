<?php
/**
 * [创建控制器的命令]
 *
 * @Author  leeprince:2020-03-25 02:10
 */

namespace LeePrince\MinprogramMember\Console;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Support\Str;

/**
 * [Description]
 *
 * @Author  leeprince:2020-07-16 23:35
 * @package LeePrince\MinprogramMember\Console
 */
class MakeControllerCommand extends ControllerMakeCommand
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
    protected $name = 'prince-make:controller-minnprogram-member';
    
    // 控制台命令的描述
    protected $description = '创建 leeprince/laravel-admin-minprogram-member composer 组件包中的控制器：php artisan prince-make:controller-minnprogram-member 控制器名(或者是带路径的控制器名)';
    
    private $rootNamespace = 'LeePrince\\MinprogramMember\\';
    
    /**
     * 获取该类的根名称空间。
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return $this->rootNamespace;
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
}