<?php

namespace App\Admin\Controllers;

use App\Models\ChuyenXe;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class ChuyenXeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ChuyenXe';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ChuyenXe());

        $grid->column('ma_chuyen', __('Ma chuyen'));
        $grid->column('ma_tuyen', __('Ma tuyen'));
        $grid->column('ma_tai_xe', __('Ma tai xe'));
        $grid->column('ma_xe', __('Ma xe'));
        $grid->column('gio_bat_dau', __('Gio bat dau'));
        $grid->column('tinh_trang', __('Tinh trang'));

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
        $show = new Show(ChuyenXe::findOrFail($id));

        $show->field('ma_chuyen', __('Ma chuyen'));
        $show->field('ma_tuyen', __('Ma tuyen'));
        $show->field('ma_tai_xe', __('Ma tai xe'));
        $show->field('ma_xe', __('Ma xe'));
        $show->field('gio_bat_dau', __('Gio bat dau'));
        $show->field('tinh_trang', __('Tinh trang'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ChuyenXe());

        $form->text('ma_tuyen', __('Ma tuyen'));
        $form->number('ma_tai_xe', __('Ma tai xe'));
        $form->text('ma_xe', __('Ma xe'));
        $form->time('gio_bat_dau', __('Gio bat dau'))->default(date('H:i:s'));
        $form->text('tinh_trang', __('Tinh trang'));

        return $form;
    }
}
