<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ShopCustomerController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header(trans('order.customer'));
            $content->description(' ');
            $content->body($this->grid());
        });
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
            ->header(trans('order.customer'))
            ->description(' ')
            ->body($this->form()->edit($id));
    }
    /**
     * Create interface.
     *
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header(trans('order.customer'))
            ->description(' ')
            ->body($this->form());
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new User);
        $grid->id('ID')->sortable();
        $grid->email('Email')->sortable();
        $grid->name(trans('order.customer_name'))->sortable();

        $grid->created_at(trans('language.admin.created_at'));
        $grid->updated_at(trans('language.admin.last_modify'));
        $grid->model()->orderBy('id', 'desc');
        $grid->actions(function ($actions) {
            $actions->disableView();
        });
//Export customer list
        $grid->disableExport(false); //Default disable button export
        $options = ['filename' => 'Customer', 'sheetname' => 'Sheet Name', 'title' => 'Export list customers'];
        $grid->exporter((new \ProcessData)->exportFromAdmin($function = 'actionExportCustomer', $options));
//End export customer list

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);
        $form->display('id', 'ID');
        $form->text('name', trans('order.customer_name'));
        $form->email('email', 'Email');
        $form->password('password', 'Password');
        $form->text('address1', trans('order.shipping_address1'));
        $form->text('address2', trans('order.shipping_address2'));
        $form->text('phone', trans('order.shipping_phone'));
        $form->saving(function (Form $form) {
            if ($form->password) {
                $form->password = bcrypt($form->password);
            } else {
                $form->password = $form->model()->password;
            }
        });
        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });

        return $form;
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }
}
