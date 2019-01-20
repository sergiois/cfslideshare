<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.SlideShare
 *
 * @copyright   Copyright (C) 2019 SergioIglesiasNET
 * @license     GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */

defined('_JEXEC') or die;

if (!$field->value || $field->value == '-1')
{
	return;
}

$value = $field->value;
$url = 'https://www.slideshare.net/api/oembed/2?url='.$value;

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);
echo $obj->html;
?>