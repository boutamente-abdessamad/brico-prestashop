<?php
$fields_form = array();

$fields_form[0]['form'] = array(
	'legend' => array(
        'title' => $this->l('Body'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Main color'),
            'name' => $this->name.'_g_main_color',
        ), 
        array(
            'type' => 'select',
            'label' => $this->l('Body font family'),
            'name' => $this->name.'_g_body_font',
            'onchange' => 'handle_font_change(this);',
            'options' => array (
                'query' => $this->fontOptions($this->googleFonts),
                'id' => 'id',
                'name' => 'name',
            ),
            'desc' => '<p id="pro_name_list_example" class="fontshow">Sample heading</p>',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Body font size'),
            'name' => $this->name.'_g_body_font_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Body font color'),
            'name' => $this->name.'_g_body_font_color',
        ),  
        array(
            'type' => 'color',
            'label' => $this->l('<a> tag color'),
            'name' => $this->name.'_g_a_color',
        ), 
        array(
            'type' => 'color',
            'label' => $this->l('<a> tag hover color'),
            'name' => $this->name.'_g_a_colorh',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save'),
    )
);
$fields_form[1]['form'] = array(
	'legend' => array(
        'title' => $this->l('Body'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Main color'),
            'name' => $this->name.'_g_main_color',
        ), 
        array(
            'type' => 'select',
            'label' => $this->l('Body font family'),
            'name' => $this->name.'_g_body_font',
            'onchange' => 'handle_font_change(this);',
            'options' => array (
                'query' => $this->fontOptions($this->googleFonts),
                'id' => 'id',
                'name' => 'name',
            ),
            'desc' => '<p id="pro_name_list_example" class="fontshow">Sample heading</p>',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Body font size'),
            'name' => $this->name.'_g_body_font_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Body font color'),
            'name' => $this->name.'_g_body_font_color',
        ),  
        array(
            'type' => 'color',
            'label' => $this->l('<a> tag color'),
            'name' => $this->name.'_g_a_color',
        ), 
        array(
            'type' => 'color',
            'label' => $this->l('<a> tag hover color'),
            'name' => $this->name.'_g_a_colorh',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save'),
    )
);
$fields_form[2]['form'] = array(
    'legend' => array(
        'title' => $this->l('Footer'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Background color'),
            'name' => $this->name.'_g_footer_bg_color',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Color'),
            'name' => $this->name.'_g_footer_color',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Links color'),
            'name' => $this->name.'_g_footer_a_color',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Links color hover'),
            'name' => $this->name.'_g_footer_a_colorh',
        ),                   
    ),
    'submit' => array(
        'title' => $this->l('Save'),
    )       
);
$fields_form[3]['form'] = array(
    'legend' => array(
        'title' => $this->l('Product grid settings'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Product grid display:', array(), 'Modules.StThemeeditor.Admin'),
            'name' => $this->name.'_p_display',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'product_type_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Default', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_type_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Type 1', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_type_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Type 2', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_type_3',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Type 3', array(), 'Admin.Theme.Panda')),
                array(
                    'id' => 'product_type_4',
                    'value' => 4,
                    'label' => $this->getTranslator()->trans('Type 4', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_type_5',
                    'value' => 5,
                    'label' => $this->getTranslator()->trans('Type 5', array(), 'Admin.Theme.Panda')),
            ),
            'icon_path' => $this->_path,
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Product name color'),
            'name' => $this->name.'_p_name_color',
        ), 
        array(
            'type' => 'color',
            'label' => $this->l('Product name color hover'),
            'name' => $this->name.'_p_name_colorh',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Product name font size'),
            'name' => $this->name.'_p_name_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Product name length', array(), 'Modules.StThemeeditor.Admin'),
            'name' => $this->name.'_p_name_length',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'p_name_length_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('1 line, product name is cut.', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'p_name_length_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('2 lines, product name is full', array(), 'Modules.StThemeeditor.Admin')),

            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Product name transform'),
            'name' => $this->name.'_p_name_transform',
            'options' => array (
                'query' => self::$text_transform,
                'id' => 'id',
                'name' => 'name'
            ),
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Price color'),
            'name' => $this->name.'_p_price_color',
        ),  
        array(
            'type' => 'text',
            'label' => $this->l('Price font size'),
            'name' => $this->name.'_p_price_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save'),
    )
);
$fields_form[4]['form'] = array(
    'legend' => array(
        'title' => $this->l('Product grid settings'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Default display', array(), 'Modules.StThemeeditor.Admin'),
            'name' => $this->name.'_cp_display',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'display_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Grid', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'display_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('List', array(), 'Modules.StThemeeditor.Admin')),
            ),
            'icon_path' => $this->_path,
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Show subcategories'),
            'name' => $this->name.'_cp_subcategories',
            'class' => 'fixed-width-xs',
            'desc' => $this->l(''),
            'values' => array(
                array(
                    'id' => 'cp_subcategories_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                    ),
                array(
                    'id' => 'cp_subcategories_off',
                    'value' => 0,
                    'label' => $this->l('No')
                )
            )
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Product per page'),
            'name' => $this->name.'_cp_perpage',
        ), 
        array(
            'type' => 'select',
            'label' => $this->l('Number product per row'),
            'name' => $this->name.'_cp_perrow',
            'options' => array (
                'query' =>self::$product_row,
                'id' => 'id',
                'name' => 'name'
            ),
        ),
        
    ),
    'submit' => array(
        'title' => $this->l('Save'),
    )
);
$fields_form[5]['form'] = array(
    'legend' => array(
        'title' => $this->l('Product grid settings'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Product thumbnails on desktop devices:', array(), 'Modules.StThemeeditor.Admin'),
            'name' => $this->name.'_pp_thumbnail',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'product_thumbnails_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Default', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_thumbnails_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Left side vertical slider', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_thumbnails_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Right side vertical slider', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_thumbnails_3',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Panda')),
                array(
                    'id' => 'product_thumbnails_4',
                    'value' => 4,
                    'label' => $this->getTranslator()->trans('Bullets', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_thumbnails_5',
                    'value' => 5,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Panda')),
            ),
            'icon_path' => $this->_path,
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Product name color'),
            'name' => $this->name.'_pp_name_color',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Product name font size'),
            'name' => $this->name.'_pp_name_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Product name transform'),
            'name' => $this->name.'_pp_name_transform',
            'options' => array (
                'query' => self::$text_transform,
                'id' => 'id',
                'name' => 'name'
            ),
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Price color'),
            'name' => $this->name.'_pp_price_color',
        ),  
        array(
            'type' => 'text',
            'label' => $this->l('Price font size'),
            'name' => $this->name.'_pp_price_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Product infomation tab display', array(), 'Modules.StThemeeditor.Admin'),
            'name' => $this->name.'_pp_infortab',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'product_thumbnails_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Default', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_thumbnails_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Left side vertical slider', array(), 'Modules.StThemeeditor.Admin')),
                array(
                    'id' => 'product_thumbnails_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Right side vertical slider', array(), 'Modules.StThemeeditor.Admin')),
            ),
            'icon_path' => $this->_path,
            'validation' => 'isUnsignedInt',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save'),
    )
);