<?php

// start tab general
$this->fields_form[]['form'] = array(
    'legend' => array(
        'title' => $this->l('General'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'infoheading',
            'label' => $this->l('Body background'),
            'name'=> 'body'
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Main color'),
            'name' => 'g_main_color',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Google font URL'),
            'name' => 'g_body_gfont_url',
            'desc' => $this->l('Example: https://fonts.googleapis.com/css?family=Open+Sans:400,700 Add 400 and 700 font weigh if exist. If you need adds latin-ext or cyrilic too. Go to '). '<a href="https://www.google.com/fonts" target="_blank">'.$this->l('Google font').'</a> to get font URL',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Google font name'),
            'name' => 'g_body_gfont_name',
            'desc' => $this->l('Example: \'Montserrat\', sans-serif'),
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Body font size'),
            'name' => 'g_body_font_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Body font color'),
            'name' => 'g_body_font_color',
        ),  
      /*   array(
            'type' => 'color',
            'label' => $this->l('Link color'),
            'name' => 'g_a_color',
        ), 
        array(
            'type' => 'color',
            'label' => $this->l('Link hover color'),
            'name' => 'g_a_colorh',
        ), */
        array(
            'type' => 'infoheading',
            'label' => $this->l('title'),
            'name' => 'heading_content'
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Title block- Google font URL'),
            'name' => 'g_title_gfont_url',
            'desc' => $this->l('Example: https://fonts.googleapis.com/css?family=Open+Sans:400,700 Add 400 and 700 font weigh if exist. If you need adds latin-ext or cyrilic too. Go to '). '<a href="https://www.google.com/fonts" target="_blank">'.$this->l('Google font').'</a> to get font URL',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Title block- Google font name'),
            'name' => 'g_title_gfont_name',
            'desc' => $this->l('Example: \'Montserrat\', sans-serif'),
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Title block font size'),
            'name' => 'g_title_font_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Title block color'),
            'name' => 'g_title_font_color',
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Title block transform'),
            'name' => 'g_title_font_transform',
            'options' => array (
                'query' => self::$text_transform,
                'id' => 'id',
                'name' => 'name'
            ),
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Title block fontsize in column'),
            'name' => 'g_title_font_size_column',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
		/* array(
            'type' => 'color',
            'label' => $this->l('Button color'),
            'name' => 'g_button_color',
        ),
		array(
            'type' => 'color',
            'label' => $this->l('Button color hover'),
            'name' => 'g_button_colorh',
        ),
		array(
            'type' => 'color',
            'label' => $this->l('Button background color'),
            'name' => 'g_button_bgcolor',
        ),
		array(
            'type' => 'color',
            'label' => $this->l('Button background color hover'),
            'name' => 'g_button_bgcolorh',
        ),
        array(
            'type' => 'infoheading',
            'label' => $this->l('Footer'),
            'name' => 'heading_footer',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color'),
            'name' => 'g_footer_bg_color',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Color'),
            'name' => 'g_footer_color',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Links color'),
            'name' => 'g_footer_a_color',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Links color hover'),
            'name' => 'g_footer_a_colorh',
        ),  */
    ),
    'submit' => array(
        'title' => $this->l('Save'),
    )
);

$this->fields_form[]['form'] = array(
    'legend' => array(
        'title' => $this->l('Product grid settings'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->l('Product grid display'),
            'name' => 'p_display',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'product_type_0',
                    'value' => 0,
                    'label' => '<img src="'._MODULE_DIR_.'/posthemeoptions/img/img1.png" alt=""/>'.$this->l('Default'),
                    ),
                array(
                    'id' => 'product_type_1',
                    'value' => 1,
                    'label' => '<img src="'._MODULE_DIR_.'/posthemeoptions/img/img2.png" alt=""/>'.$this->l('Type 1'),
                    ),
                array(
                    'id' => 'product_type_2',
                    'value' => 2,
                    'label' => '<img src="'._MODULE_DIR_.'/posthemeoptions/img/img3.png" alt=""/>'.$this->l('Type 2'),
                    ),
                array(
                    'id' => 'product_type_3',
                    'value' => 3,
                    'label' => '<img src="'._MODULE_DIR_.'/posthemeoptions/img/img4.png" alt=""/>'.$this->l('Type 3'),
                    ),
               /*  array(
                    'id' => 'product_type_4',
                    'value' => 4,
                    'label' => '<img src="'._MODULE_DIR_.'/posthemeoptions/img/img1.jpg" alt=""/>'.$this->l('Type 4'),
                    ),
                array(
                    'id' => 'product_type_5',
                    'value' => 5,
                    'label' => '<img src="'._MODULE_DIR_.'/posthemeoptions/img/img1.jpg" alt=""/>'.$this->l('Type 5'),
                    ), */
            ),
            'icon_path' => $this->_path,
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Product name color'),
            'name' => 'p_name_color',
        ), 
        array(
            'type' => 'color',
            'label' => $this->l('Product name color hover'),
            'name' => 'p_name_colorh',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Product name font size'),
            'name' => 'p_name_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'radio',
            'label' => $this->l('Product name length'),
            'name' => 'p_name_length',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'p_name_length_0',
                    'value' => 0,
                    'label' => $this->l('1 line, product name is cut.'),
                    ),
                array(
                    'id' => 'p_name_length_1',
                    'value' => 1,
                    'label' => $this->l('2 lines, product name is full'),
                    ),

            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Product name transform'),
            'name' => 'p_name_transform',
            'options' => array (
                'query' => self::$text_transform,
                'id' => 'id',
                'name' => 'name'
            ),
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Price color'),
            'name' => 'p_price_color',
        ),  
        array(
            'type' => 'text',
            'label' => $this->l('Price font size'),
            'name' => 'p_price_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save'),
    )
);
$this->fields_form[]['form'] = array(
    'legend' => array(
        'title' => $this->l('Category page settings'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'switch',
            'label' => $this->l('Show subcategories'),
            'name' => 'cp_subcategories',
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
            'name' => 'PS_PRODUCTS_PER_PAGE',
        ), 
        array(
            'type' => 'select',
            'label' => $this->l('Number product per row'),
            'name' => 'cp_perrow',
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
$this->fields_form[]['form'] = array(
    'legend' => array(
        'title' => $this->l('Product page settings'),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->l('Product thumbnails on desktop devices:'),
            'name' => 'pp_thumbnail',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'product_thumbnails_0',
                    'value' => 0,
                    'label' => $this->l('Default'),
                    ),
                array(
                    'id' => 'product_thumbnails_1',
                    'value' => 1,
                    'label' => $this->l('Left side vertical slider'),
                    ),
                array(
                    'id' => 'product_thumbnails_2',
                    'value' => 2,
                    'label' => $this->l('Right side vertical slider'),
                    ),
                /* array(
                    'id' => 'product_thumbnails_3',
                    'value' => 3,
                    'label' => $this->l('Grid view'),
                    ),
                array(
                    'id' => 'product_thumbnails_4',
                    'value' => 4,
                    'label' => $this->l('Bullets'),
                    ),
                array(
                    'id' => 'product_thumbnails_5',
                    'value' => 5,
                    'label' => $this->l('No'),
                    ), */
            ),
            'icon_path' => $this->_path,
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Product name color'),
            'name' => 'pp_name_color',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Product name font size'),
            'name' => 'pp_name_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Product name transform'),
            'name' => 'pp_name_transform',
            'options' => array (
                'query' => self::$text_transform,
                'id' => 'id',
                'name' => 'name'
            ),
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Price color'),
            'name' => 'pp_price_color',
        ),  
        array(
            'type' => 'text',
            'label' => $this->l('Price font size'),
            'name' => 'pp_price_size',
            'class' => 'fixed-width-sm',
            'suffix' => 'px',
        ),
        array(
            'type' => 'radio',
            'label' => $this->l('Product infomation tab display'),
            'name' => 'pp_infortab',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'product_thumbnails_0',
                    'value' => 0,
                    'label' => $this->l('Default'),
                    ),
                array(
                    'id' => 'product_thumbnails_1',
                    'value' => 1,
                    'label' => $this->l('Left side vertical slider'),
                    ),
                array(
                    'id' => 'product_thumbnails_2',
                    'value' => 2,
                    'label' => $this->l('Right side vertical slider'),
                    ),
            ),
            'icon_path' => $this->_path,
            'validation' => 'isUnsignedInt',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save'),
    )
);