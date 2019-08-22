<?php namespace Lovata\GoodNews\Controllers;

use Lang;
use Flash;
use BackendMenu;
use Backend\Classes\Controller;
use Backend\Classes\BackendController;

use Lovata\GoodNews\Models\Article;
use Lovata\GoodNews\Classes\Import\ImportArticleModelFromXML;

/**
 * Class Articles
 * @package Lovata\GoodNews\Controllers
 * @author Andrey Kahranenka, a.khoronenko@lovata.com, LOVATA Group
 */
class Articles extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend.Behaviors.ImportExportController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $importExportConfig = 'config_import_export.yaml';

    /**
     * Articles constructor.
     */
    public function __construct()
    {
        if (BackendController::$action == 'import') {
            Article::extend(function ($obModel) {
            $obModel->rules['external_id'] = 'required';
        });
    }


        parent::__construct();
        BackendMenu::setContext('Lovata.GoodNews', 'main-good-news', 'side-good-news-article');
    }


        /**
     * Start import from XML
     */
    public function onImportFromXML()
    {
        $obImport = new ImportArticleModelFromXML();
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
