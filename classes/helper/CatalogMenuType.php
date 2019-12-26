<?php namespace Lovata\GoodNews\Classes\Helper;

use Lovata\GoodNews\Classes\Collection\CategoryCollection;

/**
 * Class CatalogMenuType
 * @package Lovata\GoodNews\Classes\Helper
 *
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 * @author Alvaro Cánepa, https://github.com/alvaro-canepa
 */
class CatalogMenuType extends CommonMenuType
{
    const MENU_TYPE = 'shop-catalog';

    /**
     * Handler for the pages.menuitem.resolveItem event.
     * @param \RainLab\Pages\Classes\MenuItem $obMenuItem
     * @param string                          $sURL
     * @return array|mixed
     */
    public function resolveMenuItem($obMenuItem, $sURL)
    {
        $arResult = [
            'items' => [],
        ];

        //Get category list with sorted by 'nest_left'
        $obCategoryList = CategoryCollection::make()->tree();
        if ($obCategoryList->isEmpty()) {
            return $arResult;
        }

        /** @var \Lovata\GoodNews\Classes\Item\CategoryItem $obCategoryItem */
        foreach ($obCategoryList as $obCategoryItem) {
            $arMenuItem = $this->getCategoryMenuData($obCategoryItem, $obMenuItem->cmsPage, $sURL);
            if ($obMenuItem->nesting) {
                $arMenuItem['items'] = $this->getChildrenCategoryList($obCategoryItem, $obMenuItem->cmsPage, $sURL);
            }

            $arResult['items'][] = $arMenuItem;
        }

        return $arResult;
    }

    /**
     * Get default array for menu type
     * @return array|null
     */
    protected function getDefaultMenuTypeInfo()
    {
        $arResult = [
            'dynamicItems' => true,
            'nesting'      => true,
        ];

        return $arResult;
    }
}
