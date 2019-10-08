<?php
#app/Http/Admin/Controllers/Modules/Cms/CmsNewsController.php

namespace App\Admin\Controllers\Modules\Cms;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Modules\Cms\Models\CmsNews;
use App\Modules\Cms\Models\CmsNewsDescription;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CmsNewsController extends Controller
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
            ->header(trans('language.admin.cms_news'))
            ->description(' ')
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
            ->header(trans('language.admin.cms_news'))
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
            ->header(trans('language.admin.cms_news'))
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
        $grid = new Grid(new CmsNews);

        $grid->id('ID')->sortable();
        $grid->title(trans('language.admin.title'))->sortable();
        $grid->image(trans('language.admin.image'))->image('', 50);
        $grid->status(trans('language.admin.status'))->switch();
        $grid->created_at(trans('language.admin.created_at'));
        $grid->updated_at(trans('language.admin.last_modify'));
        $grid->model()->orderBy('id', 'desc');
        $grid->actions(function ($actions) {
            $actions->disableView();
        });
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableFilter();
        $grid->tools(function ($tools) {
            $tools->disableRefreshButton();
        });
        $grid->paginate(100);

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CmsNews);
//Language
        $arrParameters = request()->route()->parameters();
        $idCheck       = (int) end($arrParameters);
        $languages     = Language::getLanguages();
        $arrFields     = array();
        foreach ($languages as $key => $language) {
            if ($idCheck) {
                $langDescriptions = CmsNewsDescription::where('cms_news_id', $idCheck)->where('lang_id', $language->id)->first();
            }
            if ($languages->count() > 1) {
                $form->html('<b>' . $language->name . '</b> <img style="height:25px" src="/' . config('filesystems.disks.path_file') . '/' . $language->icon . '">');
            }
            $form->text($language->code . '__title', trans('language.admin.title'))->rules('required', ['required' => trans('validation.required')])->default(!empty($langDescriptions->title) ? $langDescriptions->title : null);
            $form->text($language->code . '__keyword', trans('language.admin.keyword'))->default(!empty($langDescriptions->keyword) ? $langDescriptions->keyword : null);
            $form->text($language->code . '__description', trans('language.admin.description'))->rules('max:300', ['max' => trans('validation.max')])->default(!empty($langDescriptions->description) ? $langDescriptions->description : null);
            $form->ckeditor($language->code . '__content', trans('language.admin.content'))->default(!empty($langDescriptions->content) ? $langDescriptions->content : null);
            $arrFields[] = $language->code . '__title';
            $arrFields[] = $language->code . '__keyword';
            $arrFields[] = $language->code . '__description';
            $arrFields[] = $language->code . '__content';
            $form->divide();
        }
        $form->ignore($arrFields);
//end language

        $form->image('image', trans('language.admin.image'))->uniqueName()->move('cms_content')->removable();
        $form->switch('status', trans('language.admin.status'));
        $form->number('sort', trans('language.admin.sort'))->rules('numeric|min:0')->default(0);

        $arrData = array();
        $form->saving(function (Form $form) use ($languages, &$arrData) {
            //Lang
            foreach ($languages as $key => $language) {
                $arrData[$language->code]['title']       = request($language->code . '__title');
                $arrData[$language->code]['keyword']     = request($language->code . '__keyword');
                $arrData[$language->code]['description'] = request($language->code . '__description');
                $arrData[$language->code]['content']     = request($language->code . '__content');

            }
            //end lang
        });

        $form->saved(function (Form $form) use ($languages, &$arrData) {

            $id = $form->model()->id;
            //Lang
            foreach ($languages as $key => $language) {
                if (array_filter($arrData[$language->code], function ($v, $k) {
                    return $v != null;
                }, ARRAY_FILTER_USE_BOTH)) {
                    $arrData[$language->code]['cms_news_id'] = $id;
                    $arrData[$language->code]['lang_id']     = $language->id;
                    CmsNewsDescription::where('lang_id', $arrData[$language->code]['lang_id'])->where('cms_news_id', $arrData[$language->code]['cms_news_id'])->delete();
                    CmsNewsDescription::insert($arrData[$language->code]);
                }
            }

            //end lang

            $file_path_admin = config('filesystems.disks.admin.root');
            $statusWatermark = \Helper::configs()['watermark'];
            $fileWatermark   = $file_path_admin . '/' . \Helper::configsGlobal()['watermark'];
            try {
                //image primary
                \Helper::processImageThumb($pathRoot = $file_path_admin, $pathFile = $form->model()->image, $widthThumb = 250, $heightThumb = null, $statusWatermark, $fileWatermark);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

        });
        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });
        return $form;
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
            ->description(' ')
            ->body($this->detail($id));
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CmsNews::findOrFail($id));
        return $show;
    }
}
