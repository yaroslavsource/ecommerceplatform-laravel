<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConfigGlobal;
use App\Models\ConfigGlobalDescription;
use App\Models\Language;
use App\Models\ShopCurrency;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Layout\Content;

class ConfigGlobalController extends Controller
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

            $content->header(trans('language.admin.info_global'));
            $content->description(' ');

            $content->body($this->viewInfo());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header(trans('language.admin.info_global'));
            $content->description(' ');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    // public function create()
    // {
    //     return Admin::content(function (Content $content) {

    //         $content->header('header');
    //         $content->description('description');

    //         $content->body($this->form());
    //     });
    // }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $currencies   = ShopCurrency::where('status', 1)->pluck('name', 'code')->all();
        $arrTimezones = [];
        foreach (timezone_identifiers_list() as $key => $value) {
            $arrTimezones[$value] = $value;
        }
        $timezones = $arrTimezones;
        $form      = new Form(new ConfigGlobal);
        $form->image('logo', trans('language.config.logo'))->removable();
        if (\Helper::configs()['watermark']) {
            $form->image('watermark', trans('language.config.watermark'))->removable();
        }
//Language
        $languages   = Language::getLanguages();
        $arrLanguage = [];
        foreach ($languages as $key => $value) {
            $arrLanguage[$value->code] = $value->name;
        }
        $arrParameters = request()->route()->parameters();
        $idCheck       = (int) end($arrParameters);

        $arrFields = array();
        foreach ($languages as $key => $language) {
            if ($idCheck) {
                $langDescriptions = ConfigGlobalDescription::where('config_id', $idCheck)->where('lang_id', $language->id)->first();
            }
            if ($languages->count() > 1) {
                $form->html('<b>' . $language->name . '</b> <img style="height:25px" src="/' . config('filesystems.disks.path_file') . '/' . $language->icon . '">');
            }

            $form->text($language->code . '__title', trans('language.config.title'))->rules('required', ['required' => trans('validation.required')])->default(!empty($langDescriptions->title) ? $langDescriptions->title : null);
            $form->text($language->code . '__keyword', trans('language.config.keyword'))->default(!empty($langDescriptions->keyword) ? $langDescriptions->keyword : null);
            $form->textarea($language->code . '__description', trans('language.config.description'))->rules('max:300', ['max' => trans('validation.max')])->default(!empty($langDescriptions->description) ? $langDescriptions->description : null);
            $arrFields[] = $language->code . '__title';
            $arrFields[] = $language->code . '__keyword';
            $arrFields[] = $language->code . '__description';
            $form->divide();
        }
        $form->ignore($arrFields);
//end language
        $form->text('phone', trans('language.config.phone'));
        $form->text('long_phone', trans('language.config.long_phone'));
        $form->text('time_active', trans('language.config.time_active'));
        $form->text('address', trans('language.config.address'));
        $form->text('email', trans('language.config.email'));
        $form->select('locale', trans('language.config.language'))->options($arrLanguage);
        $form->select('currency', trans('language.config.currency'))->options($currencies)->rules('required');
        $form->select('timezone', trans('language.config.timezone'))->options($timezones)->rules('required');
        $form->ckeditor('maintain_content', trans('language.config.maintain_content'));
        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
            $tools->disableDelete();
        });

        $arrData = array();
        $form->saving(function (Form $form) use ($languages, &$arrData) {
            //Lang
            foreach ($languages as $key => $language) {
                $arrData[$language->code]['title']       = request($language->code . '__title');
                $arrData[$language->code]['keyword']     = request($language->code . '__keyword');
                $arrData[$language->code]['description'] = request($language->code . '__description');
            }
            //end lang
        });

        //saved
        $form->saved(function (Form $form) use ($languages, &$arrData) {
            $id = $form->model()->id;
            //Lang
            foreach ($languages as $key => $language) {
                if (array_filter($arrData[$language->code], function ($v, $k) {
                    return $v != null;
                }, ARRAY_FILTER_USE_BOTH)) {
                    $arrData[$language->code]['config_id'] = $id;
                    $arrData[$language->code]['lang_id']   = $language->id;
                    ConfigGlobalDescription::where('lang_id', $arrData[$language->code]['lang_id'])->where('config_id', $arrData[$language->code]['config_id'])->delete();
                    ConfigGlobalDescription::insert($arrData[$language->code]);
                }
            }
        });
        return $form;
    }

    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('');
            $content->description('');
            $content->body(Admin::show(ShopCategory::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }

    public function viewInfo()
    {
        $infosDescription = [];
        $languages        = Language::getLanguages();
        foreach ($languages as $key => $lang) {
            $langDescriptions                      = ConfigGlobalDescription::where('lang_id', $key)->first();
            $infosDescription['title'][$key]       = $langDescriptions['title'];
            $infosDescription['description'][$key] = $langDescriptions['description'];
            $infosDescription['keyword'][$key]     = $langDescriptions['keyword'];
        }

        $infos = ConfigGlobal::first();
        return view('admin.ConfigGlobal')->with([
            "infos"            => $infos,
            "infosDescription" => $infosDescription,
            "languages"        => $languages,
        ])->render();
    }

}
