<?php namespace Lovata\GoodNews\Controllers;

use Event;
use Backend\Classes\Controller;
use Backend\Classes\BackendController;
use Lang;
use Flash;
use BackendMenu;

use Lovata\GoodNews\Models\Category;
use Lovata\GoodNews\Classes\Import\ImportCategoryModelFromXML;

/**
 * Class Categories
 * @package Lovata\GoodNews\Controllers
 * @author Andrey Kahranenka, a.khoronenko@lovata.com, LOVATA Group
 */
class Categories extends Controller
{
    public $implement = ['Backend\Behaviors\ListController',
    'Backend\Behaviors\FormController',
    'Backend\Behaviors\ReorderController',
    'Backend.Behaviors.ImportExportController',
];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $importExportConfig = 'config_import_export.yaml';

    /**
     * Categories constructor.
     */
    public function __construct()
    {
        if (BackendController::$action == 'import') {
            Category::extend(function ($obModel) {
                $obModel->rules['external_id'] = 'required';
            });
        }

        parent::__construct();
        BackendMenu::setContext('Lovata.GoodNews', 'main-good-news', 'side-good-news-category');
    }

    /**
     * Ajax handler onReorder event
     */
    public function onReorder()
    {
        $obResult = parent::onReorder();
        Event::fire('good_news.category.update.sorting');

        return $obResult;
    }

        /**
     * Start import from XML
     */
    public function onImportFromXML()
    {
        $obImport = new ImportCategoryModelFromXML();
        $obImport->import();

        $arReportData = [
            'created' => $obImport->getCreatedCount(),
            'updated' => $obImport->getUpdatedCount(),
            'skipped' => $obImport->getSkippedCount(),
            'processed' => $obImport->getProcessedCount(),
        ];

        Flash::info(Lang::get('lovata.toolbox::lang.message.import_from_xml_report', $arReportData));

        return $this->listRefresh();
    }
}
