<?php

namespace App\Admin\Controllers;

use App\Models\Tram;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class TramController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tram';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tram());

        $grid->column('ma_tram', __('Ma tram'));
        $grid->column('ten_tram', __('Ten tram'));

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
        $show = new Show(Tram::findOrFail($id));

        $show->field('ma_tram', __('Ma tram'));
        $show->field('ten_tram', __('Ten tram'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tram());

        $form->text('ten_tram', __('Ten tram'));

        return $form;
    }
}
