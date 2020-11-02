<?php
/**
 * [会员模型表格逻辑层]
 *
 * @Author  leeprince:2020-10-27 23:14
 */

namespace LeePrince\MinprogramMember\Services;

use \Encore\Admin\Widgets\Table;
use Encore\Admin\Grid;
use LeePrince\MinprogramMember\Models\Member;

class MemberGridServer
{

    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }
    
    /**
     * [模型表格-列显示]
     */
    public function column()
    {
        $this->grid->column('id', 'ID')->sortable();
        $this->grid->column('mobile', '手机号')->editable();
        $this->grid->column('memberInfos', '会员平台数')->display(function ($memberInfos) {
                $num = count($memberInfos);
                return "平台数：{$num}";
            })->expand(function ($model) {
                $comments = $model->memberInfos()->get()->map(function ($memberInfos) {
                    return $memberInfos->only(['id', 'avatar', 'nick_name', 'source_id', 'source_type', 'openid', 'union_id']);
                });
                return new Table(['ID', '头像', '昵称', '来源', '来源类型', 'openid', '第三方唯一标识'], $comments->toArray());
            });
        $this->grid->column('level', '等级')->using(Member::LEVEL);
        $this->grid->column('balance', '余额')->display(function ($balance, $column) {
            return '¥ ' . $balance;
        });
        $this->grid->column('status', '状态')->using(Member::STATUS)->label(Member::STATUS_LABEL);
        $this->grid->column('created_at', '创建时间');
        $this->grid->column('updated_at', '更新时间');
    }
    
    /**
     * [模型表格-按钮控制]
     */
    public function button()
    {
        // 禁用创建按钮
        $this->grid->disableCreateButton();
    }
    
    /**
     * [模型表格-数据操作]
     */
    public function action()
    {
        $this->grid->actions(function ($action) {
            // 去掉删除
            $action->disableDelete();
        });
    }

    /**
     * 模型详情-查询过滤
     */
    public function filter()
    {
        // 默认展开过滤
        // $this->grid->expandFilter();
        $this->grid->filter(function ($filter) {
            $filter->equal('status', '状态')->select(array_merge([' ' => '所有'], Member::STATUS));
            $filter->equal('level', '等级')->select(Member::LEVEL);
        });
    }
}