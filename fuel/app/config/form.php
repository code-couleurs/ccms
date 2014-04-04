<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */


return array(
	'form_template'         => "{open}{fields}{close}",
	'fieldset_template'     => "{open}{fields}{close}",
	'field_template'        => "<div class=\"form_intitule\">{label}{required}</div><div class=\"form_element\">{field} <span class=\"form_element_description\">{description}</span> {error_msg}</div><div class=\"clear\"></div>",
);
