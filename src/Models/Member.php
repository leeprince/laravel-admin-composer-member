<?php
/**
 * [Description]
 *
 * @Author  leeprince:2020-10-25 23:40
 */

namespace LeePrince\MinprogramMember\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * @var array 允许被批量赋值的字段
     */
    protected $fillable = ['mobile', 'status', 'level', 'balance'];
    
    /**
     * 模型日期的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';
    
    /**
     * @var array 属性类型转换
     */
    protected $casts = [
        'created_at' => 'datetime:Y年m月d日 H时i分s秒',
        'updated_at' => 'datetime:Y年m月d日 H时i分s秒',
    ];
    
    const STATUS = [
        0 => '禁用',
        1 => '正常',
    ];
    
    // http://fontawesome.io/icons/
    const STATUS_LABEL = [
        0 => 'default',
        1 => 'success',
    ];
    
    const LEVEL = [
        1 => '普通会员',
        2 => '白银会员',
        3 => '黄金会员',
        4 => '白金会员',
        5 => '砖石会员',
        6 => '超级会员'
    ];

    /**
     * Member constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');
    
        $this->setConnection($connection);
    
        $this->setTable(config('ptable.member'));
        
        parent::__construct($attributes);
    }

    /**
     * [会员信息 - 一对多，一个会员来自多个平台]
     */
    public function memberInfos()
    {
        return $this->hasMany(MemberInfo::class, 'member_id');
    }
    
    
}