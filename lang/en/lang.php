<?php return [
    'plugin'    => [
        'name'        => 'GoodNews',
        'description' => 'Articles plugin',
    ],
    'field'     => [
        'content'         => 'Article content',
        'published_start' => 'Start date of publication',
        'published_stop'  => 'Stop date of publication',
        'status'          => 'Status',
        'vendor_code'         => 'Vendor code',
        'price'               => 'Price',
        'old_price'           => 'Old price',
        'quantity'            => 'Quantity',
        'brand'               => 'Brand',
        'offer'               => 'Offers',
        'currency'            => 'Currency',
        'check_offer_active'  => 'When you receive a list of active products, check for active offers.',
        'additional_category' => 'Additional categories',
        'promo_block_type'    => 'Promo block with product list',
        'promo_block'         => 'Promo block',
        'category_parent_id'  => 'Parent category ID',
        'children_category'   => 'Children categories',
        'product_id'          => 'Product ID',
        'rate'                => 'Rate',
        'tax_is_global'       => 'Tax will apply to all products',
        'tax_percent'         => 'Tax percent',
        'tax'                 => 'Tax',
        'without_tax'         => 'Without tax',
        'with_tax'            => 'With tax',
        'countries'           => 'Countries',
        'states'              => 'States',
        'main_price_type'     => 'Main price',
        'price_include_tax'   => 'Price includes taxes',
        'discount_price'      => 'Discount price',

        'hide_brand_import_from_csv'    => 'Hide "Import from CSV" button for brands',
        'hide_brand_import_from_xml'    => 'Hide "Import from XML" button for brands',
        'hide_category_import_from_csv' => 'Hide "Import from CSV" button for categories',
        'hide_category_import_from_xml' => 'Hide "Import from XML" button for categories',
        'hide_product_import_from_csv'  => 'Hide "Import from CSV" button for products',
        'hide_product_import_from_xml'  => 'Hide "Import from XML" button for products',
        'hide_offer_import_from_csv'    => 'Hide "Import from CSV" button for offers',
        'hide_offer_import_from_xml'    => 'Hide "Import from XML" button for offers',
        'hide_price_import_from_xml'    => 'Hide "Import from XML" button for prices',
    ],
    'component' => [
        'article_page'         => 'Article page',
        'article_page_desc'    => '',
        'article_data'         => 'Article data',
        'article_data_desc'    => '',
        'article_list'         => 'Article list',
        'article_list_desc'    => '',

        'category_page'        => 'Category page',
        'category_page_desc'   => '',
        'category_data'        => 'Category data',
        'category_data_desc'   => '',
        'category_list'        => 'Category list',
        'category_list_desc'   => '',

        'sorting_publish_asc'     => 'By date of publication (asc)',
        'sorting_publish_desc'    => 'By date of publication (desc)',
        'sorting_view_count_acs'  => 'By view count (asc)',
        'sorting_view_count_desc' => 'By view count (desc)',
    ],
    'settings'    => [
        'formula_calculate_discount_from_price'      => 'Formula of calculating discounts on prices with taxes',
        'formula_calculation_from_backend_price'     => 'Discount is deducted from backend price (default)',
        'formula_calculation_from_price_without_tax' => 'Discount is deducted from price without taxes',
        'formula_calculation_from_price_with_tax'    => 'Discount is deducted from price with taxes',
    ],


    'menu'      => [
        'article'  => 'Articles',
        'category' => 'Categories',
        'main'                        => 'Catalog',
        'categories'                  => 'Categories',
        'product'                     => 'Products',
        'brands'                      => 'Brands',
        'shop_catalog'                => 'Product catalog',
        'shop_category'               => 'Product category',
        'all_shop_categories'         => 'All categories of products',
        'promo_block'                 => 'Promo blocks',
        'promo'                       => 'Promotions',
        'price_type'                  => 'Price types',
        'price_type_description'      => 'Manage price types',
        'currency'                    => 'Currency',
        'currency_description'        => 'Manage currencies',
        'tax'                         => 'Taxes',
        'tax_description'             => 'Manage taxes',
        'configuration'               => 'Catalog settings',
        'main_settings'               => 'Basic settings',
        'main_settings_description'   => 'Basic settings of your catalog',
        'import_xml_file'             => 'Import from XML',
        'import_xml_file_description' => 'Settings of import from XML file',
    ],
    'tab'       => [
        'permissions' => 'Manage article',
        'offer'          => 'Trade offers',
        'price'          => 'Prices',
        'settings'       => 'Category GoodNews configuration',
        'taxes'          => 'Taxes',
        'import_setting' => 'Import',
    ],
    'article'   => [
        'name'       => 'article',
        'list_title' => 'Article list',
        'import_title' => 'Import products',
        'export_title' => 'Export products',

    ],
    'category'  => [
        'name'       => 'category',
        'list_title' => 'Category list',
        'import_title' => 'Import categories',
        'export_title' => 'Export categories',
    ],
    'status' => [
        1 => 'New',
        2 => 'In progress',
        3 => 'Checking',
        4 => 'Published',
    ],
    'permission' => [
        'article'  => 'Manage article',
        'category' => 'Manage category',
    ],
    'widget'      => [
        'import_from_xml_files' => 'Import from XML',
        'import_from_csv_files' => 'Import from CSV',
    ],
];
