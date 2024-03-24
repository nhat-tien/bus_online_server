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
        $grid->column('ma_tram_di', __('Ma tram di'));
        $grid->column('ma_tram_den', __('Ma tram den'));
        $grid->column('hoan_thanh', __('Hoan thanh'));
        $grid->column('trang_thai_thanh_toan', __('Trang thai thanh toan'));
        $grid->column('tien_phi', __('Tien phi'));
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
        $show->field('ma_tram_di', __('Ma tram di'));
        $show->field('ma_tram_den', __('Ma tram den'));
        $show->field('hoan_thanh', __('Hoan thanh'));
        $show->field('trang_thai_thanh_toan', __('Trang thai thanh toan'));
        $show->field('tien_phi', __('Tien phi'));
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
        $form->text('ma_tram_di', __('Ma tram di'));
        $form->text('ma_tram_den', __('Ma tram den'));
        $form->switch('hoan_thanh', __('Hoan thanh'));
        $form->select('trang_thai_thanh_toan', __('Trang thai thanh toan'))->options([NULL => 'NULL', 'wait' => 'Đợi', 'done' => 'Xong'])->default(NULL);
        $form->text('tien_phi', __('Tien phi'));
        return $form;
    }
}
