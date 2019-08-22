<?php namespace Lovata\GoodNews\Classes\Import;

use Lovata\Toolbox\Classes\Helper\AbstractImportModelFromCSV;

use Lovata\GoodNews\Models\Category;
use Lovata\GoodNews\Models\Article;

/**
 * Class ImportArticleModelFromCSV
 * @package Lovata\GoodNews\Classes\Import
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ImportArticleModelFromCSV extends AbstractImportModelFromCSV
{
    const MODEL_CLASS = Article::class;

    /** @var Article */
    protected $obModel;

    protected $bWithTrashed = true;
    protected $arAdditionalCategoryList = null;

    /**
     * ImportArticleModelFromCSV constructor.
     */
    public function __construct()
    {
        $this->arExistIDList = (array) Article::whereNotNull('external_id')->lists('external_id', 'id');
        $this->arExistIDList = array_filter($this->arExistIDList);
    }

    /**
     * Prepare array of import data
     */
    protected function prepareImportData()
    {
        $this->setActiveField();
        $this->setCategoryField();

        $this->initPreviewImage();
        $this->initImageList();
        $this->initAdditionalCategoryField();

        parent::prepareImportData();
    }

    /**
     * Process model object after creation/updating
     */
    protected function processModelObject()
    {
        $this->importPreviewImage();
        $this->importImageList();

        $this->syncAdditionalCategoryList();
    }



    /**
     * Set category_id filed value
     */
    protected function setCategoryField()
    {
        $sCategoryID = array_get($this->arImportData, 'category_id');
        if ($sCategoryID === null) {
            return;
        }

        //Find category by external ID
        $obCategory = Category::getByExternalID($sCategoryID)->first();
        if (empty($obCategory)) {
            $this->arImportData['category_id'] = null;
        } else {
            $this->arImportData['category_id'] = $obCategory->id;
        }
    }

    /**
     * Init additional category ID list
     */
    protected function initAdditionalCategoryField()
    {
        $sCategoryList = array_get($this->arImportData, 'additional_category');
        if ($sCategoryList === null) {
            return;
        }

        $arCategoryIDList = explode(',', $sCategoryList);
        foreach ($arCategoryIDList as $iKey => &$iCategoryID) {
            $iCategoryID = trim($iCategoryID);
            if (empty($iCategoryID)) {
                unset($arCategoryIDList[$iKey]);
            }
        }

        if (empty($arCategoryIDList)) {
            $this->arAdditionalCategoryList = [];

            return;
        }

        $this->arAdditionalCategoryList = (array) Category::whereIn('external_id', $arCategoryIDList)->lists('id');
    }

    /**
     * Sync link Article with additional categories
     */
    protected function syncAdditionalCategoryList()
    {
        if ($this->arAdditionalCategoryList === null) {
            return;
        }

        $this->obModel->additional_category()->sync($this->arAdditionalCategoryList);
    }
}
