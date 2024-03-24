<?php

namespace App\Admin\Controllers;

use App\Models\ChuyenXe;
use App\Models\Tuyen;
use App\Models\User;
use App\Models\Xe;
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
        $grid->column('luot_di', __('Gio luot di'));
        $grid->column('luot_ve', __('Gio luot ve'));
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
        $show->field('luot_di', __('Gio luot di'));
        $show->field('luot_ve', __('Gio luot ve'));
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

        $form->text('ma_chuyen', __("Ma chuyen"));
        $form->select('ma_tuyen', __("Ma tuyen"))->options(Tuyen::all()->pluck('ten_tuyen', 'ma_tuyen'));
        $form->select('ma_tai_xe', __("Ma tai xe"))->options(User::where('role', 'driver')->pluck('name', 'id'));
        $form->select('ma_xe', __("Ma xe"))->options(Xe::all()->pluck('ma_xe', 'ma_xe'));
        $form->time('luot_di', __('Gio luot di'))->default(date('H:i:s'));
        $form->time('luot_ve', __('Gio luot ve'))->default(date('H:i:s'));
        $form->select('tinh_trang', __("Tinh trang"))->options([ "0" => 'Vắng', "1" => "Bình thường", "2" => "Rất đông" ])->default("0");

        return $form;
    }
}
