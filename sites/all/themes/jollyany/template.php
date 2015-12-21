<?php

/**
 * Define $root global variable.
 */
global $theme_root, $parent_root, $theme_path, $image_default;
$theme_root = base_path() . path_to_theme();
$parent_root = base_path() . drupal_get_path('theme', 'jollyany');
$image_default = $theme_root.'/demos/nopicture.png';

/**
 * Strip unwanted rel attributes from meta tags in <head>.
 */
function jollyany_html_head_alter(&$head_elements) {
    unset($head_elements['system_meta_generator']);
    foreach ($head_elements as $key => $element) {
        if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'canonical') {
            unset($head_elements[$key]);
        }
        if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'shortlink') {
            unset($head_elements[$key]);
        }
    }
}

function jollyany_css_alter(&$css) {
    // Remove defaults.css file.
    unset($css[drupal_get_path('module', 'system') . '/defaults.css']);
    unset($css[drupal_get_path('module', 'system') . '/system.css']);
    unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
    unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
    unset($css[drupal_get_path('module', 'user') . '/user.css']);
    // .. etc..
}


/**
 * Apply alternate UL class to Drupal tabs.
 */
function jollyany_menu_local_tasks(&$variables) {
    $output = '';

    if (!empty($variables['primary'])) {
        $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
        $variables['primary']['#prefix'] .= '<ul class="nav nav-tabs">';
        $variables['primary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['primary']);
    }
    if (!empty($variables['secondary'])) {
        $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
        $variables['secondary']['#prefix'] .= '<ul class="nav nav-tabs">';
        $variables['secondary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['secondary']);
    }

    return $output;
}

/**
 * Assign theme hook suggestions for custom templates.
 */
function jollyany_preprocess_page(&$vars, $hook) {
    if (isset($vars['node'])) {
        $suggest = "page__{$vars['node']->type}";
        $vars['theme_hook_suggestions'][] = $suggest;
    }

    $status = drupal_get_http_header("status");
    if ($status == "404 Not Found") {
        $vars['theme_hook_suggestions'][] = 'page__404';
    }

    if (arg(0) == 'taxonomy' && arg(1) == 'term') {
        $term = taxonomy_term_load(arg(2));
        $vars['theme_hook_suggestions'][] = 'page--taxonomy--' . $term->vid;
    }
	
	// If this is a panel page, add template suggestions.
	if($panel_page = page_manager_get_current_page()) {
		// Add a generic suggestion for all panel pages.
		$vars['theme_hook_suggestions'][] = 'page__panel';
		// Add the panel page machine name to the template suggestions.
		$vars['theme_hook_suggestions'][] = 'page__' . $panel_page['name'];
		// Add a body class for good measure.
		$body_classes[] = 'page-panel';
	}
}

function jollyany_preprocess_region(&$variables) {
  // Create the $content variable that templates expect.
  $variables['content'] = $variables['elements']['#children'];
  $variables['region'] = $variables['elements']['#region'];

  $variables['classes_array'][] = drupal_region_class($variables['region']);
  $variables['theme_hook_suggestions'][] = 'region__' . $variables['region'];
}


/**
 * Define some variables for use in theme templates.
 */
function jollyany_process_page(&$variables) {
    // Assign site name and slogan toggle theme settings to variables.
    $variables['disable_site_name'] = theme_get_setting('toggle_name') ? FALSE : TRUE;
    $variables['disable_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
    // Assign site name/slogan defaults if there is no value.
    if ($variables['disable_site_name']) {
        $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
    }
    if ($variables['disable_site_slogan']) {
        $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
    }
}

/**
 * Define breadcrumb in theme templates.
 */
function jollyany_breadcrumb($variables) {
    $breadcrumb = $variables['breadcrumb'];
    if (!empty($breadcrumb)) {
        // Provide a navigational heading to give context for breadcrumb links to
        // screen-reader users. Make the heading invisible with .element-invisible.
        $crumbs = '<ul class="breadcrumb pull-right">';
        $array_size = count($breadcrumb);
        if ($array_size > 1) {
            $array_size = $array_size - 1;
        }
        $i = 0;
        while ($i < $array_size) {
            $crumbs .= '<li>' . $breadcrumb[$i] . '</li>';
            $i++;
        }
        $crumbs .= '<li>' . drupal_get_title() . '</li></ul>';
        return $crumbs;
    }
}

/**
 * Preprocess variables for the username.
 */
function jollyany_preprocess_username(&$vars) {
    global $theme_key;
    $theme_name = $theme_key;

    // Add rel=author for SEO and supporting search engines
    if (isset($vars['link_path'])) {
        $vars['link_attributes']['rel'][] = 'author';
    } else {
        $vars['attributes_array']['rel'][] = 'author';
    }
}

/* main ul */

function jollyany_menu_tree__main_menu($variables) {
    return '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';
}

/* main li */

function jollyany_menu_link__main_menu(array $variables) {
    $element = $variables['element'];
    
    if (empty($element['#localized_options']))
    {
        $element['#localized_options'] = array();
    }

    //Not sure if this is the cleanest method, but it should allow us to follow
    //the active-trail across menu items, based on path.

    //Get the start of the current path (e.g. admin/build/modules would be admin)
    $base_path = preg_replace('/^([A-Za-z0-9_-]+)\/(.*)/', '${1}', drupal_get_path_alias($_GET['q']));

    //Get the current link we're looking at
    $this_link = drupal_get_path_alias($element['#href']);

    //If the
   /* if($base_path == $this_link)
   {
       $element['#localized_options']['attributes']['class'][] = 'active';
   } */
    
    $sub_menu = '';
    if ($element['#below']) {
        foreach ($element['#below'] as $key => $val) {
            if (is_numeric($key)) {
                $element['#below'][$key]['#theme'] = 'menu_link__main_menu_inner'; 
            }
        }
        $element['#below']['#theme_wrappers'][0] = 'menu_tree__main_menu_inner';  
        $sub_menu = drupal_render($element['#below']);
    }
	if ($sub_menu != '') {
		//Give this menu item a unique id
		$element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
		$element['#localized_options']['attributes']['data-toggle'][] = 'dropdown';
	}
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);

    $addClass = '';
    if ($sub_menu != '') {
		if($element['#title'] == 'Projects' || $element['#title'] == 'Blog') {
			$addClass = 'dropdown yamm-fw-none';
		} else {
			$addClass = 'dropdown yamm-fw';
		}
    }
    return '<li class="' . $addClass . '"' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/* inner ui */

function jollyany_menu_tree__main_menu_inner($variables) {
	$output = '<ul class="dropdown-menu"><li><div class="yamm-content"><div class="row">' . $variables['tree'] . '</div></div></li></ul>';
    return $output;
}

/* inner li */

function jollyany_menu_link__main_menu_inner($variables) {
    $element = $variables['element'];
    $sub_menu = '';
    if ($element['#below']) {
        foreach ($element['#below'] as $key => $val) {
            if (is_numeric($key)) {
                $element['#below'][$key]['#theme'] = 'menu_link__main_menu_inner'; 
            }
        }
        $element['#below']['#theme_wrappers'][0] = 'menu_tree__main_menu_inner';  
        $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    
    $addClass = '';
    if ($sub_menu != '') {
        $addClass = 'dropdown-submenu';
    }
    return '<ul class="col-sm-3"><li class="'. $addClass .'" ' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li></ul>";
}

function jollyany_pagination($node, $mode = 'n') {
    if (!function_exists('prev_next_nid')) {
        return NULL;
    }

    switch ($mode) {
        case 'p':
            $n_nid = prev_next_nid($node->nid, 'prev');
            $link_text = "Previous post";
            break;

        case 'n':
            $n_nid = prev_next_nid($node->nid, 'next');
            $link_text = "Next post";
            break;

        default:
            return NULL;
    }

    if ($n_nid) {
        $n_node = '';
        $n_node = node_load($n_nid);

        switch ($n_node->type) {
            case 'projects':
                $id = $n_node->nid;
                return $id;

            case 'blog':
                $id = $n_node->nid;
                return $id;
				
			case 'our_team':
                $id = $n_node->nid;
                return $id;
				
			case 'our_services':
                $id = $n_node->nid;
                return $id;
			
			case 'testimonial':
                $id = $n_node->nid;
                return $id;
			
            case 'article':
                $html = l($link_text, 'node/' . $n_node->nid);
                return $html;
        }
    }
}

/**
 * Overrides theme_item_list().
 */
function jollyany_item_list($vars) {
    if (isset($vars['attributes']['class']) && is_array($vars['attributes']['class']) && in_array('pager', $vars['attributes']['class'])) {
        $vars['attributes']['class'] = 'pagination';
        foreach ($vars['items'] as $i => &$item) {
            if (in_array('pager-current', $item['class'])) {
                $item['class'] = array('active');
                $item['data'] = '<a href="javascript: void(0);">' . $item['data'] . '</a>';
                ;
            } elseif (in_array('pager-item', $item['class'])) {
                $item['class'] = array('page-numbers');
                $item['data'] = $item['data'];
            } elseif (in_array('pager-next', $item['class'])) {
                $item['class'] = array('next page-numbers');
                $item['data'] = $item['data'];
            } elseif (in_array('pager-last', $item['class'])) {
                $item['class'] = array('page-numbers');
                $item['data'] = $item['data'];
            } elseif (in_array('pager-first', $item['class'])) {
                $item['class'] = array('page-numbers first');
                $item['data'] = $item['data'];
            } elseif (in_array('pager-previous', $item['class'])) {
                $item['class'] = array('prev page-numbers');
                $item['data'] = $item['data'];
            } elseif (in_array('pager-ellipsis', $item['class'])) {
                $item['class'] = array('disabled');
                $item['data'] = $item['data'];
            }
        }
        return '<div class="text-center clearfix"><div class="pagination_wrapper">' . theme_item_list($vars) . '</div></div>';
    }
    return theme_item_list($vars);
}

/**
 * Overrides theme_pager_link().
 */
function jollyany_pager_link($variables) {
    $text = $variables['text'];
    $page_new = $variables['page_new'];
    $element = $variables['element'];
    $parameters = $variables['parameters'];
    $attributes = $variables['attributes'];

    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if ($new_page = implode(',', pager_load_array($page_new[$element], $element, explode(',', $page)))) {
        $parameters['page'] = $new_page;
    }

    $query = array();
    if (count($parameters)) {
        $query = drupal_get_query_parameters($parameters, array());
    }
    if ($query_pager = pager_get_query_parameters()) {
        $query = array_merge($query, $query_pager);
    }

    // Set each pager link title
    if (!isset($attributes['title'])) {
        static $titles = NULL;
        if (!isset($titles)) {
            $titles = array(
                t('«') => t('Go to first page'),
                t('‹') => t('Go to previous page'),
                t('›') => t('Go to next page'),
                t('»') => t('Go to last page'),
            );
        }
        if (isset($titles[$text])) {
            $attributes['title'] = $titles[$text];
        } elseif (is_numeric($text)) {
            $attributes['title'] = t('Go to page @number', array('@number' => $text));
        }
    }

    // @todo l() cannot be used here, since it adds an 'active' class based on the
    //   path only (which is always the current path for pager links). Apparently,
    //   none of the pager links is active at any time - but it should still be
    //   possible to use l() here.
    // @see http://drupal.org/node/1410574
    $attributes['href'] = url($_GET['q'], array('query' => $query));
    return '<a' . drupal_attributes($attributes) . '>' . check_plain($text) . '</a>';
}

function jollyany_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'search_block_form') {
		$form['#attributes']['class'][] = 'search_form';
        $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['class'][] = 'form-control';

        // Add extra attributes to the text box
        $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
        $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
        // Prevent user from searching the default text
        $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";

        // Alternative (HTML5) placeholder attribute instead of using the javascript
        $form['search_block_form']['#attributes']['placeholder'] = t('Search');
    }
	
	if(substr($form_id, 0, 28) == 'uc_product_add_to_cart_form_') {
		$form['qty'] = array(
		  '#type' => 'textfield',
		  '#type' => 'textfield',
		  '#title' => t(''),
		  '#default_value' => '1',
		);
		$form['qty']['#attributes']['class'][] = 'form-control';
	}
}

/**
 * Add a comma delimiter between several field types.
 */
function jollyany_field($variables) {

    $output = '';

    // Render the label, if it's not hidden.
    if (!$variables['label_hidden']) {
        
    }

    // Render the items.

    $arrayFields = array('title', 'body', 'field_icon', 'field_tags', 'field_category', 'field_image', 'field_layout',
	'field_member_regency', 'field_facebook_url', 'field_twitter_url', 'field_google_plus_url', 'field_email',
	'field_regency', 'field_company');

    foreach ($arrayFields as $field) {
        if ($variables['element']['#field_name'] == $field) {
            foreach ($variables['items'] as $delta => $item) {
                $rendered_tags[] = drupal_render($item);
            }
            $output .= implode(', ', $rendered_tags);
        }
    }

    if (!in_array($variables['element']['#field_name'], $arrayFields)) {
        // Default rendering taken from theme_field().
        foreach ($variables['items'] as $delta => $item) {
            $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
            $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
        }
    }

    // Render the top-level DIV.

    return $output;
}

function jollyany_form_contact_site_form_alter(&$form, $form_state) {
	$form['name'] = array('#type' => 'textfield',
		'#title' => t('Name'),
		'#maxlength' => 255,
		'#required' => TRUE,
		'#placeholder' => t('Name'),
		'#weight' => 1,
    );
	$form['mail'] = array('#type' => 'textfield',
		'#title' => t('Email Address'),
		'#maxlength' => 255,
		'#required' => TRUE,
		'#placeholder' => t('Email Address'),
		'#weight' => 2,
    );
	$form['website'] = array('#type' => 'textfield',
		'#title' => t('Website'),
		'#maxlength' => 255,
		'#required' => TRUE,
		'#placeholder' => t('Website'),
		'#weight' => 3,
    );
	$form['subject'] = array('#type' => 'textfield',
		'#title' => t('Subject'),
		'#maxlength' => 255,
		'#required' => TRUE,
		'#placeholder' => t('Subject'),
		'#weight' => 4,
    );
	$form['message'] = array(
		'#type' => 'textarea',
		'#title' => t('Message'),
		'#placeholder' => t('Message'),
		'#weight' => 5,
    );
	$form['copy']['#access'] = FALSE;
	/*$form['submit'] = array(
		'#type' => 'submit',
		'#value' => t('Submit'),
		'#weight' => 6,
    );*/
}

function jollyany_format_comma_field($field_category, $node, $limit = NULL) {

    if (module_exists('i18n_taxonomy')) {
        $language = i18n_language();
    }

    $category_arr = array();
    $category = '';
    $field = field_get_items('node', $node, $field_category);

    if (!empty($field)) {
        foreach ($field as $item) {
            $term = taxonomy_term_load($item['tid']);


            if ($term) {
                if (module_exists('i18n_taxonomy')) {
                    $term_name = i18n_taxonomy_term_name($term, $language->language);

                    // $term_desc = tagclouds_i18n_taxonomy_term_description($term, $language->language);
                } else {
                    $term_name = $term->name;
                    //$term_desc = $term->description;
                }

                $category_arr[] = l($term_name, 'taxonomy/term/' . $item['tid']);
            }

            if ($limit) {
                if (count($category_arr) == $limit) {
                    $category = implode(', ', $category_arr);
                    return $category;
                }
            }
        }
    }
    $category = implode(', ', $category_arr);

    return $category;
}

/**
 * User CSS function. Separate from jollyany_preprocess_html so function can be called directly before </head> tag.
 */
function jollyany_user_css() {
    echo "<!-- User defined CSS -->";
    echo "<style type='text/css'>";
    echo theme_get_setting('user_css');
    echo "</style>";
    echo "<!-- End user defined CSS -->";
}

/**
 * Add theme META tags and style sheets to the header.
 */
function jollyany_preprocess_html(&$vars) {
    global $parent_root;

	$meta_title = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#weight' => 1,
        '#attributes' => array(
            'name' => 'title',
            'content' => theme_get_setting('seo_title')
        )
    );
    $meta_description = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#weight' => 2,
        '#attributes' => array(
            'name' => 'description',
            'content' => theme_get_setting('seo_description')
        )
    );
    $meta_keywords = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#weight' => 3,
        '#attributes' => array(
            'name' => 'keywords',
            'content' => theme_get_setting('seo_keywords')
        )
    );
	
    $viewport = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
		'#weight' => 4,
        '#attributes' => array(
            'name' => 'viewport',
            'content' => 'width=device-width, initial-scale=1, maximum-scale=1',
        )
    );
	
	if(theme_get_setting('background_type') == 'image') {
		$background = array(
			'#type' => 'markup',
			'#markup' => "<style type='text/css'>body {background: url(" . $parent_root . "/img/backgrounds/" . theme_get_setting('background_image') . ".png);}</style> ",
			'#weight' => 5,
		);
	} else {
		$background = array(
			'#type' => 'markup',
			'#markup' => "<style type='text/css'>body {background: #" . theme_get_setting('background_color') . ";}</style> ",
			'#weight' => 5,
		);
	}

	if (theme_get_setting('seo_title') != "") {
        drupal_add_html_head($meta_title, 'meta_title');
    }
    if (theme_get_setting('seo_description') != "") {
        drupal_add_html_head($meta_description, 'meta_description');
    }
    if (theme_get_setting('seo_keywords') != "") {
        drupal_add_html_head($meta_keywords, 'meta_keywords');
    }
    drupal_add_html_head($viewport, 'viewport');
	drupal_add_html_head($background, 'background');

}

?>