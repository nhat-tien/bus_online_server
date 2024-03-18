<?php

namespace App\Admin\Controllers;

use App\Models\BangDonTra;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class BangDonTraController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BangDonTra';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BangDonTra());

        $grid->column('id', __('Id'));
        $grid->column('ma_chuyen', __('Ma chuyen'));
        $grid->column('ma_khach_hang', __('Ma khach hang'));
        $grid->column('ma_tram_don', __('Ma tram don'));
        $grid->column('ma_tram_tra', __('Ma tram tra'));
        $grid->column('hoan_thanh', __('Hoan thanh'));
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
        $show = new Show(BangDonTra::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('ma_chuyen', __('Ma chuyen'));
        $show->field('ma_khach_hang', __('Ma khach hang'));
        $show->field('ma_tram_don', __('Ma tram don'));
        $show->field('ma_tram_tra', __('Ma tram tra'));
        $show->field('hoan_thanh', __('Hoan thanh'));
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
        $form = new Form(new BangDonTra());

        $form->text('ma_chuyen', __('Ma chuyen'));
        $form->number('ma_khach_hang', __('Ma khach hang'));
        $form->text('ma_tram_don', __('Ma tram don'));
        $form->text('ma_tram_tra', __('Ma tram tra'));
        $form->switch('hoan_thanh', __('Hoan thanh'));

        return $form;
    }
}
