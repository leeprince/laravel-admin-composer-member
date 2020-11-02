<?php
/**
 * [Description]
 *
 * @Author  leeprince:2020-10-25 23:40
 */

namespace LeePrince\MinprogramMember\Models;

use Illuminate\Database\Eloquent\Model;

class MemberInfo extends Model
{
    /**
     * @var array 允许被批量赋值的字段
     */
    protected $fillable = ['member_id', 'mobile', 'source_id', 'source_type', 'openid', 'union_id', 'nick_name', 'avatar'];
    
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
    
    /**
     * 来源ID类型
     */
    const SOURCE_ID =  [
        1 => '微信',
        2 => '支付宝',
        3 => 'prince商城'
        
    ];
    
    /**
     * 来源类型
     */
    const SOURCE_TYPE =  [
         1 => '小程序',
         2 => '公众号',
         3 => 'APP'
    ];
    
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');
        
        $this->setConnection($connection);
        
        $this->setTable(config('ptable.member_info'));
        
        parent::__construct($attributes);
    }
    
    /**
     * [访问器 - 来源]
     *
     * @param $value
     */
    public function getSourceIdAttribute($value)
    {
        return self::SOURCE_ID[$value];
    }
    
    /**
     * [访问器 - 来源类型]
     *
     * @param $value
     */
    public function getSourceTypeAttribute($value)
    {
        return self::SOURCE_TYPE[$value];
    }
    
    
}