<?php

namespace LeePrince\MinprogramMember\Http\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use LeePrince\MinprogramMember\Models\Member;
use LeePrince\MinprogramMember\Services\MemberDetailServer;
use LeePrince\MinprogramMember\Services\MemberFormServer;
use LeePrince\MinprogramMember\Services\MemberGridServer;

class MemberController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '小程序会员中心';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        // Grid 在新版2.x 后会被替换为 Table, 功能一致, 不过更便于理解
        $grid = new Grid(new Member());
        
        $server = new MemberGridServer($grid);
        $server->column();
        $server->button();
        $server->action();
        $server->filter();
        
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Member::findOrFail($id));

        $server = new MemberDetailServer($show);
        $server->field();
        $server->panel();

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Member());

        $server = new MemberFormServer($form);
        $server->form();
        $server->tools();
        $server->footer();

        return $form;
    }
}
