<?php
/**
 * [会员模型详情逻辑层]
 *
 * @Author  leeprince:2020-11-02 21:42
 * @package LeePrince\MinprogramMember\Services
 */

namespace LeePrince\MinprogramMember\Services;


use Encore\Admin\Show;
use LeePrince\MinprogramMember\Models\Member;

class MemberDetailServer
{
    /**
     * MemberDetailServer constructor.
     *
     * @param Show $show
     */
    public function __construct(Show $show)
    {
        $this->show = $show;
    }

    /**
     * 模型详情 - 字段显示
     */
    public function field()
    {
        $this->show->field('id', 'ID');
        $this->show->field('mobile', '手机号');
        $this->show->field('status', '状态')->using(Member::STATUS);
        $this->show->field('level', '等级')->using(Member::LEVEL);
    }

    /**
     * 模型详情-右上角面板操作
     *      面板右上角默认有三个按钮编辑、删除、列表
     */
    public function panel()
    {
        $this->show->panel()->tools(function ($tools) {
            // $tools->disableEdit();
            // $tools->disableList();
            $tools->disableDelete();
        });
    }
}