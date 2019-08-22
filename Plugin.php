<?php namespace Lovata\GoodNews;

use Event;
use System\Classes\PluginBase;

//Event
use Lovata\GoodNews\Classes\Event\ArticleModelHandler;
use Lovata\GoodNews\Classes\Event\CategoryModelHandler;

/**
 * Class Plugin
 * @package Lovata\GoodNews
 * @author  Andrey Kahranenka, a.khoronenko@lovata.com, LOVATA Group
 */
class Plugin extends PluginBase
{
    /** @var array Plugin dependencies */
    public $require = ['Lovata.Toolbox'];

    /**
     * Registration components
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Lovata\GoodNews\Components\ArticleList'         => 'ArticleList',
            'Lovata\GoodNews\Components\ArticlePage'         => 'ArticlePage',
            'Lovata\GoodNews\Components\ArticleData'         => 'ArticleData',
            'Lovata\GoodNews\Components\ArticleCategoryList' => 'ArticleCategoryList',
            'Lovata\GoodNews\Components\ArticleCategoryPage' => 'ArticleCategoryPage',
            'Lovata\GoodNews\Components\ArticleCategoryData' => 'ArticleCategoryData',
        ];
    }

    /**
     * Plugin boot method
     */
    public function boot()
    {
        $this->addEventListener();
    }

    /**
     * @return array
     */
    public function registerSettings()
    {
        return [
            'goodnews-menu-main-settings' => [
                'label'       => 'lovata.goodnews::lang.menu.main_settings',
                'description' => 'lovata.goodnews::lang.menu.main_settings_description',
                'category'    => 'lovata.goodnews::lang.tab.settings',
                'icon'        => 'oc-icon-book',
                'class'       => 'Lovata\GoodNews\Models\Settings',
                'order'       => 100,
                'permissions' => [
                    'goodnews-settings',
                ],
            ],

            'goodnews-menu-import-xml-file'   => [
                'label'       => 'lovata.goodnews::lang.menu.import_xml_file',
                'description' => 'lovata.goodnews::lang.menu.import_xml_file_description',
                'category'    => 'lovata.goodnews::lang.tab.settings',
                'icon'        => 'oc-icon-download',
                'class'       => 'Lovata\GoodNews\Models\XmlImportSettings',
                'order'       => 8000,
                'permissions' => [
                    'goodnews-menu-import-xml-file',
                ],
            ],
        ];
    }

    /**
     * Add event listeners
     */
    protected function addEventListener()
    {
        Event::subscribe(ArticleModelHandler::class);
        Event::subscribe(CategoryModelHandler::class);
    }

        /**
     * @return array
     */
    public function registerReportWidgets()
    {
        return [
            'Lovata\GoodNews\Widgets\ImportFromXML' => [
                'label' => 'lovata.goodnews::lang.widget.import_from_xml_files',
            ],
            'Lovata\GoodNews\Widgets\ImportFromCSV' => [
                'label' => 'lovata.goodnews::lang.widget.import_from_csv_files',
            ]
        ];
    }
}
