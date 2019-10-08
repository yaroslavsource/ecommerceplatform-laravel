<?php
#app/Modules/Cms/Models/CmsCategory.php
namespace App\Modules\Cms\Models;

use App\Models\Language;
use App\Modules\Cms\Models\CmsCategoryDescription;
use App\Modules\Cms\Models\CmsContent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CmsCategory extends Model
{
    public $timestamps = false;
    public $table      = 'cms_category';
    protected $appends = [
        'title',
        'keyword',
        'description',
    ];
    public $lang_id = 1;
    public function __construct()
    {
        parent::__construct();
        $lang          = Language::getArrayLanguages();
        $this->lang_id = $lang[app()->getLocale()];
    }
    public function descriptions()
    {
        return $this->hasMany(CmsCategoryDescription::class, 'cms_category_id', 'id');
    }
    public function contents()
    {
        return $this->hasMany(CmsContent::class, 'category_id', 'id');
    }

    public function getTreeCategory($root = 0)
    {
        $list   = [];
        $result = $this->select('id', 'parent')
            ->where('parent', $root)
            ->get();
        foreach ($result as $value) {
            $list[$value['id']] = $value->getTitle();
            if ($this->checkChild($value['id']) > 0) {
                $this->getTreeCategoryTmp($value['id'], $list);
            }
        }
        return $list;
    }

    public function getTreeCategoryTmp($id, &$list, $st = '--')
    {
        $result = $this->select('id', 'parent')
            ->where('parent', $id)
            ->get();
        foreach ($result as $value) {
            $list[$value['id']] = $st . ' ' . $value->getTitle();
            $this->getTreeCategoryTmp($value['id'], $list, $st . '--');
        }

    }

    public function checkChild($id)
    {
        return $this->where('parent', $id)->count();
    }

    public function arrChild($id)
    {
        return $this->where('parent', $id)->pluck('id')->all();
    }

/**
 * Get category parent
 * @return [type]     [description]
 */
    public function getParent()
    {
        return $this->find($this->parent);

    }
/**
 * Get category child
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
    public function getCateChild($id)
    {
        return $this->with('contens')->where('parent', $id)->get();
    }
/**
 * Get all products in category, include child category
 * @param  [type] $id    [description]
 * @param  [type] $limit [description]
 * @return [type]        [description]
 */
    public function getContentsToCategory($id, $limit = null, $opt = null)
    {
        $arrChild   = $this->arrChild($id);
        $arrChild[] = $id;
        $query      = (new CmsContent)->where('status', 1)->whereIn('category_id', $arrChild)->sort();
        if (!(int) $limit) {
            return $query->get();
        } else
        if ($opt == 'paginate') {
            return $query->paginate((int) $limit);
        } else {
            return $query->limit($limit)->get();
        }

    }
/**
 * [getCategories description]
 * @param  [type] $parent [description]
 * @return [type]         [description]
 */
    public static function getCategories($parent)
    {
        return self::where('status', 1)->where('parent', $parent)->sort()->get();
    }

/**
 * [getThumb description]
 * @return [type] [description]
 */
    public function getThumb()
    {
        if ($this->image) {
            if (!file_exists(PATH_FILE . '/thumb/' . $this->image)) {
                return $this->getImage();
            } else {
                if (!file_exists(PATH_FILE . '/thumb/' . $this->image)) {
                } else {
                    return PATH_FILE . '/thumb/' . $this->image;
                }
            }
        } else {
            return 'images/no-image.jpg';
        }

    }

/**
 * [getImage description]
 * @return [type] [description]
 */
    public function getImage()
    {
        if ($this->image) {

            if (!file_exists(PATH_FILE . '/' . $this->image)) {
                return 'images/no-image.jpg';
            } else {
                return PATH_FILE . '/' . $this->image;
            }
        } else {
            return 'images/no-image.jpg';
        }

    }

    public function getUrl()
    {
        return route('cmsCategory', ['name' => \Helper::strToUrl(empty($this->title) ? 'no-title' : $this->title), 'id' => $this->id]);
    }

    //Fields language
    public function getTitle()
    {
        return $this->processDescriptions()['title'] ?? '';
    }
    public function getKeyword()
    {
        return $this->processDescriptions()['keyword'] ?? '';
    }
    public function getDescription()
    {
        return $this->processDescriptions()['description'] ?? '';
    }

//Attributes
    public function getTitleAttribute()
    {
        return $this->getTitle();
    }
    public function getKeywordAttribute()
    {
        return $this->getKeyword();

    }
    public function getDescriptionAttribute()
    {
        return $this->getDescription();

    }

//Scort
    public function scopeSort($query, $column = null)
    {
        $column = $column ?? 'sort';
        return $query->orderBy($column, 'asc')->orderBy('id', 'desc');
    }

//=========================

    public function uninstallExtension()
    {
        if (Schema::hasTable($this->table)) {
            Schema::drop($this->table);
        }
    }

    public function installExtension()
    {
        $return = ['error' => 0, 'msg' => 'Install modules success'];
        if (!Schema::hasTable($this->table)) {
            try {
                Schema::create($this->table, function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('image', 100)->nullable();
                    $table->tinyInteger('parent')->default(0);
                    $table->tinyInteger('sort')->default(0);
                    $table->tinyInteger('status')->default(0);
                });
            } catch (\Exception $e) {
                $return = ['error' => 1, 'msg' => $e->getMessage()];
            }
        } else {
            $return = ['error' => 1, 'msg' => 'Table ' . $this->table . ' exist!'];
        }
        return $return;
    }
    public function processDescriptions()
    {
        return $this->descriptions->keyBy('lang_id')[$this->lang_id] ?? [];
    }

}
