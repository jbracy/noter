<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Theme_Noteroo extends Theme {

    public $name			= 'Noteroo';
    public $author			= 'Jordan Bracy';
    public $description		= 'Custom theme for Noteroo';
    public $version			= '1.0';
	public $options 		= array('layout' => 			array('title' => 'Layout',
																'description'   => 'Which type of layout shall we use?',
																'default'       => '2 column',
																'type'          => 'select',
																'options'       => '2 column=Two Column|full-width=Full Width|full-width-home=Full Width Home Page',
																'is_required'   => TRUE),
									'logo' =>				array(	'title' => 'Logo',
																	'description' => 'Logo URL',
																	'default' => '',
																	'type' => 'text',
																	'options' => '',
																	'is_required' => FALSE
																)
								   );

	public function __construct()
	{
		$supported_lang	= Settings::get('supported_languages');
	}
}

/* End of file theme.php */
