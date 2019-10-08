<?php
#app/Admin/Controller/EmailSubscribeController.php
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EmailSubscribeController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @return Content
     */

    public function index(Content $content)
    {
        return $content
            ->header(trans('language.subscribe.manager'))
            ->description('description')
            ->body($this->grid());
    }
    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header(trans('language.subscribe.manager'))
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header(trans('language.subscribe.manager'));
            $content->description(' ');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Subscribe);
        $grid->id('ID')->sortable();
        $grid->email(trans('language.subscribe.email'))->sortable();
        $grid->disableRowSelector();
        $grid->disableFilter();
        $grid->tools(function ($tools) {
            $tools->disableRefreshButton();
        });
        $grid->disableExport();
        $grid->actions(function ($actions) {
            $actions->disableView();
        });
        $grid->model()->orderBy('id', 'desc');
        return $grid;
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Subscribe);

        $form->email('email', trans('language.subscribe.email'));
        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });

        return $form;
    }
}
