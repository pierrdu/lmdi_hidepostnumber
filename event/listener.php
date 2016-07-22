<?php
/**
*
* @package phpBB Extension - Hide Post Number
* @copyright (c) 2015-2016 LMDI - Pierre Duhem
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lmdi\hidepostnumber\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents ()
	{
	return array(
		'core.viewtopic_modify_post_row'	=>	'hide_post_number',
	);
	}

	public function hide_post_number ($event)
	{
		$post_row = $event['post_row'];
		unset ($post_row['POSTER_POSTS']);
		$event['post_row'] = $post_row;
	}
}
