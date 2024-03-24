<?php

namespace App\Admin\Controllers;

use App\Models\ChiTietTuyen;
use App\Models\Tram;
use App\Models\Tuyen;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class ChiTietTuyenController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ChiTietTuyen';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ChiTietTuyen());

        $grid->column('id', __('Id'));
        $grid->column('ma_tuyen', __('Ma tuyen'));
        $grid->column('thu_tu_tram', __('Thu tu tram'));
        $grid->column('ma_tram', __('Ma tram'));
        $grid->column('tien_phi', __('Tien phi'));

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
        $show = new Show(ChiTietTuyen::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('ma_tuyen', __('Ma tuyen'));
        $show->field('thu_tu_tram', __('Thu tu tram'));
        $show->field('ma_tram', __('Ma tram'));
        $show->field('tien_phi', __('Tien phi'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ChiTietTuyen());

        $form->select('ma_tuyen', __("Ma tuyen"))->options(Tuyen::all()->pluck('ten_tuyen', 'ma_tuyen'));
        $form->text('thu_tu_tram', __('Thu tu tram'));
        $form->select('ma_tram', __("Ma tram"))->options(Tram::all()->pluck('ten_tram', 'ma_tram'));
        $form->number('tien_phi', __('Tien phi'));

        return $form;
    }
}
