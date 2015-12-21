<?php

drupal_add_js(drupal_get_path('theme', 'jollyany') . '/js/theme_settings.js');

/**
 * Implements hook_form_system_theme_settings_alter()
 */
function jollyany_form_system_theme_settings_alter(&$form, &$form_state) {

	$contact_icon = theme_get_setting('contact_icon');
    if (file_uri_scheme($contact_icon) == 'public') {
        $contact_icon = file_uri_target($contact_icon);
    }

    // Main settings wrapper
    $form['options'] = array(
        '#type' => 'vertical_tabs',
        '#default_tab' => 'defaults',
        '#weight' => '-10',
        '#attached' => array(
            'css' => array(drupal_get_path('theme', 'jollyany') . '/css/theme-options.css'),
        ),
    );

    // ----------- General -----------
    $form['options']['general'] = array(
        '#type' => 'fieldset',
        '#title' => t('General'),
    );

    // Breadcrumbs
    $form['options']['general']['breadcrumbs'] = array(
        '#type' => 'checkbox',
        '#title' => 'Show Breadcrumbs',
        '#default_value' => theme_get_setting('breadcrumbs'),
    );
	
	// Contact MAP
    $form['options']['general']['contactmap'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Contact Map</h3>',
    );

    // Company Name
    $form['options']['general']['contactmap']['contactmap_title'] = array(
        '#type' => 'textfield',
        '#title' => 'Company Name',
        '#default_value' => theme_get_setting('contactmap_title'),
    );
	
	// Website
    $form['options']['general']['contactmap']['contactmap_website'] = array(
        '#type' => 'textfield',
        '#title' => 'Website',
        '#default_value' => theme_get_setting('contactmap_website'),
    );

    // Contact MAP Address
    $form['options']['general']['contactmap']['contactmap_address'] = array(
        '#type' => 'textarea',
        '#title' => 'Address',
        '#default_value' => theme_get_setting('contactmap_address'),
    );
	
	// Contact MAP Phone
    $form['options']['general']['contactmap']['contactmap_phone'] = array(
        '#type' => 'textfield',
        '#title' => 'Telephone',
        '#default_value' => theme_get_setting('contactmap_phone'),
    );

    // Contact MAP Lat
    $form['options']['general']['contactmap']['contactmap_lat'] = array(
        '#type' => 'textfield',
        '#title' => 'Lat',
        '#default_value' => theme_get_setting('contactmap_lat'),
    );
	
	// Contact MAP Long
    $form['options']['general']['contactmap']['contactmap_long'] = array(
        '#type' => 'textfield',
        '#title' => 'Long',
        '#default_value' => theme_get_setting('contactmap_long'),
    );
	
	$form['options']['general']['contactmap']['contact_icon'] = array(
        '#type' => 'textfield',
        '#title' => 'Path to Contact Icon',
        '#default_value' => $contact_icon,
		'#disabled' => TRUE,
    );

    $form['options']['general']['contactmap']['contact_icon_upload'] = array(
        '#type' => 'file',
        '#title' => 'Upload Contact Icon',
        '#description' => 'Upload a new Contact Icon.',
    );

    // -------- SEO ---------
    $form['options']['general']['seo'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">SEO</h3>',
    );

    // SEO Title
    $form['options']['general']['seo']['seo_title'] = array(
        '#type' => 'textfield',
        '#title' => 'Title',
        '#default_value' => theme_get_setting('seo_title'),
    );

    // SEO Description
    $form['options']['general']['seo']['seo_description'] = array(
        '#type' => 'textarea',
        '#title' => 'Description',
        '#default_value' => theme_get_setting('seo_description'),
    );

    // SEO Keywords
    $form['options']['general']['seo']['seo_keywords'] = array(
        '#type' => 'textarea',
        '#title' => 'Keywords',
        '#default_value' => theme_get_setting('seo_keywords'),
    );


    // ----------- Layout -----------
    $form['options']['layout'] = array(
        '#type' => 'fieldset',
        '#title' => t('Layout'),
    );
	
	// ------ Page Layout Settings ------
    $form['options']['layout']['page'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Page Layout Settings</h3>',
    );
	
	//Page Layout Container
    $form['options']['layout']['page']['page_style1'] = array(
        '#type' => 'textarea',
        '#title' => 'Page Style: Boxed Layout - Topbar (Example Home Version 7)',
		'#default_value' => theme_get_setting('page_style1'),
    );
	
	//Page Layout Container
    $form['options']['layout']['page']['page_style2'] = array(
        '#type' => 'textarea',
        '#title' => 'Page Style: Boxed Layout (Example Home Version 8)',
		'#default_value' => theme_get_setting('page_style2'),
    );
	
	//Page Layout Container
    $form['options']['layout']['page']['page_onepage'] = array(
        '#type' => 'textarea',
        '#title' => 'Page Style: One Page',
		'#default_value' => theme_get_setting('page_onepage'),
    );
	
	//Page Layout Container
    $form['options']['layout']['page']['page_only_content'] = array(
        '#type' => 'textarea',
        '#title' => 'Page Style: Only content Layout (Example 404 page)',
		'#default_value' => theme_get_setting('page_only_content'),
    );
	
	
	// ------ Header Settings ------
    $form['options']['layout']['header'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Header Page Settings</h3>',
    );
	
    $form['options']['layout']['header']['header_1'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Header Style 1',
		'#default_value' => theme_get_setting('header_1'),
    );
	$form['options']['layout']['header']['header_2'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Header Style 2',
		'#default_value' => theme_get_setting('header_2'),
    );
	$form['options']['layout']['header']['header_3'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Header Style 3',
		'#default_value' => theme_get_setting('header_3'),
    );
	
	
	// ------ Footer Settings ------
    $form['options']['layout']['footer'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Footer Page Settings</h3>',
    );
	
    $form['options']['layout']['footer']['footer_1'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Footer Style 1',
		'#default_value' => theme_get_setting('footer_1'),
    );
	$form['options']['layout']['footer']['footer_2'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Footer Style 2',
		'#default_value' => theme_get_setting('footer_2'),
    );
	$form['options']['layout']['footer']['footer_3'] = array(
        '#type' => 'textarea',
        '#title' => 'Page With Footer Style 3',
		'#default_value' => theme_get_setting('footer_3'),
    );
	

	// -------- Projects Layout Settings ----------
    $form['options']['layout']['projects'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Projects Page Layout</h3>',
    );
	
	// View Project Text Button
    $form['options']['layout']['projects']['project_text_button'] = array(
        '#type' => 'textfield',
        '#title' => 'View Project Text Button',
        '#default_value' => theme_get_setting('project_text_button'),
    );
	
	$form['options']['layout']['projects']['projects_fulllayout'] = array(
        '#type' => 'textarea',
        '#title' => 'Projects Page Style: Full Layout',
		'#default_value' => theme_get_setting('projects_fulllayout'),
    );
	
    // Projects Layout
    /*$form['options']['layout']['projects']['projects_layout'] = array(
        '#type' => 'radios',
        '#title' => 'Select a projects layout:',
        '#default_value' => theme_get_setting('projects_layout'),
        '#options' => array(
            '2_columns' => '2 Columns',
            '3_columns' => '3 Columns',
            '4_columns' => '4 Columns (default)',
			'2_columns_boxed' => '2 Columns Boxed',
            '3_columns_boxed' => '3 Columns Boxed',
            '4_columns_boxed' => '4 Columns Boxed',
			'3_columns_full' => '3 Columns Full Width',
            '4_columns_full' => '4 Columns Full Width',
            '6_columns_full' => '6 Columns Full Width',
        ),
    );*/
	
	
	// ------- Blog Layout Settings ----------
    /*$form['options']['layout']['blog'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Blog Page Layout</h3>',
    );
	
    // Blog Layout
    $form['options']['layout']['blog']['blog_layout'] = array(
        '#type' => 'radios',
        '#title' => 'Select a blog layout:',
        '#default_value' => theme_get_setting('blog_layout'),
        '#options' => array(
            'sidebar_right' => 'Sidebar Right (default)',
            'full_width' => 'Full Width',
        ),
    );*/
	
	/*
	// --------- Contact Layout Settings ----------
    $form['options']['layout']['contact'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Contact Page Layout</h3>',
    );
	
    // Contact Layout
    $form['options']['layout']['contact']['contact_layout'] = array(
        '#type' => 'radios',
        '#title' => 'Select a contact layout:',
        '#default_value' => theme_get_setting('contact_layout'),
        '#options' => array(
            'contact-1' => 'Contact 1 (default)',
            'contact-2' => 'Contact 2',
            'contact-3' => 'Contact 3',
        ),
    );
	*/
	
	// ----------- Design  Settings -----------
    $form['options']['design'] = array(
        '#type' => 'fieldset',
        '#title' => 'Design',
    );
	
	// Switcher
    $form['options']['design']['switcher'] = array(
        '#type' => 'checkbox',
        '#title' => 'Show Switcher Control',
        '#default_value' => theme_get_setting('switcher'),
    );
	
	// Layout Option
    $form['options']['design']['layout_style'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Layout Style</h3>',
    );
	
	$form['options']['design']['layout_style']['layout_option'] = array(
        '#type' => 'radios',
        '#title' => 'Select a layout style:',
        '#default_value' => theme_get_setting('layout_option'),
        '#options' => array(
            'boxed' => 'Boxed',
            'fullwidth' => 'Full Width (default)',
        ),
    );
	
	// Header Option
    $form['options']['design']['header_style'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Header Style</h3>',
    );
	
    // Header Option
    $form['options']['design']['header_style']['header_option'] = array(
        '#type' => 'radios',
        '#title' => 'Select a header style option:',
        '#default_value' => theme_get_setting('header_option'),
        '#options' => array(
            'header_default' => 'Header Default',
            'header1' => 'Header 1',
            'header2' => 'Header 2',
            'header3' => 'Header 3',
        ),
    );
	
	// Footer Option
    $form['options']['design']['footer_style'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Footer Style</h3>',
    );
	
    // Footer Option
    $form['options']['design']['footer_style']['footer_option'] = array(
        '#type' => 'radios',
        '#title' => 'Select a footer style option:',
        '#default_value' => theme_get_setting('footer_option'),
        '#options' => array(
            'footer_default' => 'Footer Default',
            'footer1' => 'Footer 1',
            'footer2' => 'Footer 2',
            'footer3' => 'Footer 3',
        ),
    );

    // Color Option
    $form['options']['design']['color'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Color</h3>',
    );

    // Color Scheme Option
    $form['options']['design']['color']['color_scheme'] = array(
        '#type' => 'select',
        '#title' => 'Color Scheme',
        '#default_value' => theme_get_setting('color_scheme'),
        '#options' => array(
            'blue' => 'Blue',
            'green' => 'Green',
            'light-blue' => 'Light Blue',
            'light-green' => 'Light Green',
            'orange' => 'Orange',
            'green' => 'Green',
            'purple' => 'Purple',
            'red' => 'Red',
            'tael' => 'Tael',
            'violet' => 'Violet',
            'yellow' => 'Yellow (default)',
        ),
    );

    // Background Option
    $form['options']['design']['background'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Background</h3>',
    );
	
	// Background Color Option
    $form['options']['design']['background']['background_style'] = array(
        '#type' => 'radios',
        '#title' => 'Select a background style:',
        '#default_value' => theme_get_setting('background_style'),
        '#options' => array(
            'light' => 'Light (default)',
            'dark' => 'Dark',
        ),
    );

    // CSS
    $form['options']['design']['css'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">CSS</h3>',
    );

    // User CSS
    $form['options']['design']['css']['user_css'] = array(
        '#type' => 'textarea',
        '#title' => 'Add your own CSS',
        '#default_value' => theme_get_setting('user_css'),
    );
	
	// Submit Button
    $form['#submit'][] = 'jollyany_settings_submit';
}

function jollyany_settings_submit($form, &$form_state) {
    // Get the previous value
    $previous = 'public://' . $form['options']['general']['contactmap']['contact_icon']['#default_value'];

    $file = file_save_upload('contact_icon_upload');
    if ($file) {
        $parts = pathinfo($file->filename);
        $destination = 'public://' . $parts['basename'];
        $file->status = FILE_STATUS_PERMANENT;

        if (file_copy($file, $destination, FILE_EXISTS_REPLACE)) {
            $_POST['contact_icon'] = $form_state['values']['contact_icon'] = $destination;
            if ($destination != $previous) {
                return;
            }
        }
    } else {
        // Avoid error when the form is submitted without specifying a new image
        $_POST['contact_icon'] = $form_state['values']['contact_icon'] = $previous;
    }
}

?>