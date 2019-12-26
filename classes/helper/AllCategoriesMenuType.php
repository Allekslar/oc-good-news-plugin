<?php namespace Lovata\GoodNews\Classes\Helper;

use Lovata\GoodNews\Models\Category;
use Lovata\GoodNews\Classes\Item\CategoryItem;

/**
 * Class AllCategoriesMenuType
 * @package Lovata\GoodNews\Classes\Helper
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class AllCategoriesMenuType extends CommonMenuType
{
    const MENU_TYPE = 'all-shop-categories';

    /**
     * Handler for the pages.menuitem.resolveItem event.
     * @param \RainLab\Pages\Classes\MenuItem $obMenuItem
     * @param string                          $sURL
     *
     * @return array|mixed
     */
    public function resolveMenuItem($obMenuItem, $sURL)
    {
        $arResult = [
            'items' => [],
        ];

        //Get category list with sorted by 'nest_left'
        $obCategoryList = Category::active()->orderBy('nest_left', 'asc')->get();
        if ($obCategoryList->isEmpty()) {
            return $arResult;
        }

        /** @var Category $obCategory */
        foreach ($obCategoryList as $obCategory) {
            $obCategoryItem = CategoryItem::make($obCategory->id, $obCategory);

            $arMenuItem = $this->getCategoryMenuData($obCategoryItem, $obMenuItem->cmsPage, $sURL);
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
        ];

        return $arResult;
    }
}
