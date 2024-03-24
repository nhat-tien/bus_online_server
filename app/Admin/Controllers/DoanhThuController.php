<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\DoanhThu;

class DoanhThuController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'DoanhThu';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DoanhThu());

        $grid->column('id', __('Id'));
        $grid->column('ngay_lap_thong_ke', __('Ngay lap thong ke'));
        $grid->column('tong_doanh_thu', __('Tong doanh thu'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(DoanhThu::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('ngay_lap_thong_ke', __('Ngay lap thong ke'));
        $show->field('tong_doanh_thu', __('Tong doanh thu'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new DoanhThu());

        $form->date('ngay_lap_thong_ke', __('Ngay lap thong ke'))->default(date('Y-m-d'));
        // $form->number('tong_doanh_thu', __('Tong doanh thu'));

        return $form;
    }
}
