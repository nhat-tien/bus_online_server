<?php

namespace App\Admin\Controllers;

use App\Models\Tuyen;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class TuyenController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tuyen';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tuyen());

        $grid->column('ma_tuyen', __('Ma tuyen'));
        $grid->column('ten_tuyen', __('Ten tuyen'));

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
        $show = new Show(Tuyen::findOrFail($id));

        $show->field('ma_tuyen', __('Ma tuyen'));
        $show->field('ten_tuyen', __('Ten tuyen'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tuyen());

        $form->text('ma_tuyen', __('Ma tuyen'));
        $form->text('ten_tuyen', __('Ten tuyen'));

        return $form;
    }
}
