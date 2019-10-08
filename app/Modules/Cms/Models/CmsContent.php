<?php
#app/Modules/Cms/Models/CmsContent.php
namespace App\Modules\Cms\Models;

use App\Models\Language;
use App\Modules\Cms\Models\CmsCategory;
use App\Modules\Cms\Models\CmsImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CmsContent extends Model
{
    public $table      = 'cms_content';
    protected $appends = [
        'title',
        'keyword',
        'description',
        'content',
    ];
    public $lang_id = 1;
    public function __construct()
    {
        parent::__construct();
        $lang          = Language::getArrayLanguages();
        $this->lang_id = $lang[app()->getLocale()];
    }

    public function category()
    {
        return $this->belongsTo(CmsCategory::class, 'category_id', 'id');
    }
    public function descriptions()
    {
        return $this->hasMany(CmsContentDescription::class, 'cms_content_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(CmsImage::class, 'content_id', 'id');
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

/**
 * [getUrl description]
 * @return [type] [description]
 */
    public function getUrl()
    {
        return route('cmsContent', ['name' => \Helper::strToUrl(empty($this->title) ? 'no-title' : $this->title), 'id' => $this->id]);
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
    public function getContent()
    {
        return $this->processDescriptions()['content'] ?? '';
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

    public function getContentAttribute()
    {
        return $this->getContent();

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
                    $table->integer('category_id')->default(0);
                    $table->string('image', 100)->nullable();
                    $table->tinyInteger('sort')->default(0);
                    $table->tinyInteger('status')->default(0);
                    $table->timestamp('created_at')->nullable();
                    $table->timestamp('updated_at')->nullable();
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
