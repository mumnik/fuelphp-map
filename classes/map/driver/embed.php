<?php
/**
 * Maps API call
 *
 * @package    Map
 * @version    0.1
 * @author     Hinashiki
 * @license    MIT License
 * @copyright  2014 - Hinashiki
 * @link       https://github.com/hinashiki/fuelphp-map
 */
/**
 * Output Google Maps Embed API
 *
 * @reference https://developers.google.com/maps/documentation/embed/guide?hl=ja
 */

namespace Map;

class Map_Driver_Embed extends \Map_Driver
{
	const BASE_URL = 'https://www.google.com/maps/embed/v1/place';

	protected function _output()
	{
		if(strlen($this->_address) === 0)
		{
			throw new \PhpErrorException(__METHOD__.': please set address.');
		}

		$url = self::BASE_URL;
		$query = http_build_query(array(
			'key'      => \Config::get('map.google.api_key.browser'),
			'q'        => $this->_address,
			'zoom'     => $this->_zoom,
			'language' => \Config::get('map.google.language', 'lv'),
		));
		$url .= '?'.$query;

		return '<iframe src="'.$url.'" width="'.$this->_width.'" height="'.$this->_height.'" frameborder="0"></iframe>';
	}
}
