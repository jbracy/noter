<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Image picker widget
 *
 * @author  	James Doyle
 * @package		PyroCMS
 */
class Widget_ImageWidget extends Widgets
{


	/**
	 * The widget title
	 *
	 * @var array
	 */
	public $title = 'Image';

	/**
	 * The translations for the widget description
	 *
	 * @var array
	 */
	public $description = array(
		'en' => 'Add any image in your file library as a widget'
		// ,
		// 'el' => 'Δημιουργήστε περιοχές με δικό σας κώδικα HTML',
		// 'br' => 'Permite criar blocos de HTML customizados',
		// 'pt' => 'Permite criar blocos de HTML customizados',
		// 'nl' => 'Maak blokken met maatwerk HTML',
		// 'ru' => 'Создание HTML-блоков с произвольным содержимым',
		// 'id' => 'Membuat blok HTML apapun',
		// 'fi' => 'Luo lohkoja omasta HTML koodista',
		// 'fr' => 'Créez des blocs HTML personnalisés',
		);

	/**
	 * The author of the widget
	 *
	 * @var string
	 */
	public $author = 'James Doyle';

	/**
	 * The author's website.
	 *
	 * @var string
	 */
	public $website = 'http://ohdoylerules.com/';

	/**
	 * The version of the widget
	 *
	 * @var string
	 */
	public $version = '1.0';

	/**
	 * The fields for customizing the options of the widget.
	 *
	 * @var array
	 */
	public $fields = array(
		array(
			'field' => 'image_id',
			'label' => 'Image',
			'rules' => 'required'
			),
		array(
			'field' => 'link',
			'label' => 'Link',
			'rules' => ''
			),
		array(
			'field' => 'link_target',
			'label' => 'Link Target',
			'rules' => 'required'
			)
		);

	public function get_folder_images() {
		$this->load->model('files/file_m');
		$folder_files = $this->file_m->get_all();
		$imagearray = array();
		foreach ($folder_files as $file) {
			$val = explode('/', $file->mimetype);
			if ($val[0] == 'image') {
				$imagearray[$file->id] = $file->name;
			}
		}
		return $imagearray;
	}

	public function form($options)
	{
		$image_select = $this->get_folder_images();

		return array(
			'options' => $options,
			'image_select' => $image_select,
			'link_select' => array('_self' => 'Same Window', '_blank' => 'New Window')
			);
	}

	/**
	 * The main function of the widget.
	 *
	 * @param array $options The options for displaying an HTML widget.
	 * @return array
	 */
	public function run($options)
	{
		if (empty($options['image_id'])) {
			return false;
		}

		if (empty($options['link'])) {
			return '';
		}

		if (empty($image_select)) {
			return '';
		}

		// Store the feed items
		return array('image_id' => $image_select, 'link' => $options['link'], 'link_target' => $link_select);
	}

}