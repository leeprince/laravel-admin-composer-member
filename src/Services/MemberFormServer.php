<?php
/**
 * [会员模型表单逻辑层]
 *
 * @Author  leeprince:2020-11-02 22:09
 * @package LeePrince\MinprogramMember\Services
 */

namespace LeePrince\MinprogramMember\Services;


use Encore\Admin\Form;
use LeePrince\MinprogramMember\Models\Member;

class MemberFormServer
{
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    /**
     * 模型表单
     */
    public function form()
    {
        $this->form->display('id', 'ID');
        $this->form->text('mobile', '手机号');
        $this->form->switch('status', '状态');
        $this->form->select('level', '等级')->options(Member::LEVEL);
    }

    /**
     * 模型表单-自定义工具
     *      表单右上角默认按钮
     */
    public function tools()
    {
        $this->form->tools(function (Form\Tools $tools) {
            // 去掉`列表`按钮
            // $tools->disableList();

            // 去掉`删除`按钮
            $tools->disableDelete();

            // 去掉`查看`按钮
            // $tools->disableView();

            // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            // $tools->add('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;delete</a>');
        });

    }

    /**
     * 模型表单-表单脚部
     */
    public function footer()
    {
        $this->form->footer(function ($footer) {
            // 去掉`重置`按钮
            // $footer->disableReset();

            // 去掉`提交`按钮
            // $footer->disableSubmit();

            // 去掉`查看`checkbox
            // $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            // $footer->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });
    }
}