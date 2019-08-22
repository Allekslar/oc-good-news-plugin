<?php namespace Lovata\GoodNews\Models;

use Lovata\Toolbox\Models\CommonSettings;


use Lovata\GoodNews\Classes\Import\ImportCategoryModelFromXML;
use Lovata\GoodNews\Classes\Import\ImportArticleModelFromXML;

/**
 * Class XmlImportSettings
 * @package Lovata\GoodNews\Models
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 *
 * @mixin \October\Rain\Database\Builder
 * @mixin \Eloquent
 * @mixin \System\Behaviors\SettingsModel
 */
class XmlImportSettings extends CommonSettings
{
    const SETTINGS_CODE = 'lovata_goodnews_xml_import_settings';

    public $settingsCode = 'lovata_goodnews_xml_import_settings';

    /**
     * Get import file list
     * @return array
     */
    public function getFileList()
    {
        $arFileList = (array) $this->get('file_list');
        $arFileList = array_pluck($arFileList, 'path');

        return $arFileList;
    }

    /**
     * Get Article field list
     * @return array
     */
    public function getArticleFields()
    {
        $obParser = new ImportArticleModelFromXML();
        $arFileList = $obParser->getFields();

        return $arFileList;
    }


    /**
     * Get category field list
     * @return array
     */
    public function getCategoryFields()
    {
        $obParser = new ImportCategoryModelFromXML();
        $arFileList = $obParser->getFields();

        return $arFileList;
    }
}
