<?php //-->
/*
 * This file is part of the Block package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Block\Field;

use Eden\Block\Base;
use Eden\Block\Argument;

/**
 * Radio Field Block
 *
 * @vendor Eden
 * @package Block
 * @author Christian Blanquera cblanquera@openovate.com
 */
class Radio extends Base 
{
	protected $attributes	= array();
	protected $value 		= null;
	protected $items		= array();

	/**
	 * Returns a template file
	 * 
	 * @param array data
	 * @return string
	 */
	public function getTemplate() 
	{
		return __DIR__.'/radio.phtml';
	}
	
	/**
	 * Returns the template variables in key value format
	 *
	 * @param array data
	 * @return array
	 */
	public function getVariables() 
	{
		$this->attributes['type'] = 'radio';
		
		return array(
			'attributes' 	=> $this->attributes,
			'items'			=> $this->items,
			'selected'		=> $this->value);
	}
	
	/**
	 * Returns the template variables in key value format
	 *
	 * @param string|array
	 * @param scalar|null
	 * @return Eden\Block\Field\Radio
	 */
	public function setAttributes($name, $value = null) 
	{
		Argument::i()
			->test(1, 'string', 'array')
			->test(2, 'scalar', 'null');
		
		if(is_array($name)) {
			$this->attributes = $name;
			return $this;
		}
		
		$this->attributes[$name] = $value;
		return $this;
	}
	
	/**
	 * Adds an item or set of items
	 *
	 * @param scalar|array
	 * @param scalar|null
	 * @param string|null
	 * @return Eden\Block\Field\Radio
	 */
	public function setItems($value, $label = null) 
	{
		Argument::i()
			->test(1, 'string', 'array')
			->test(2, 'scalar', 'null')
			->test(3, 'string', 'null');
			
		if(is_array($value)) {
			$this->items = $value;
			return $this;
		}
			
		$this->items[$value] = $label;
		return $this;
	}
	
	/**
	 * Sets the field name
	 *
	 * @param scalar
	 * @return Eden\Block\Field\Radio
	 */
	public function setName($name) 
	{
		return $this->setAttributes('name', $name);
	}
	
	/**
	 * Sets the field value
	 *
	 * @param scalar|null
	 * @return Eden\Block\Field\Radio
	 */
	public function setValue($value) 
	{
		Argument::i()->test(1, 'scalar', 'null');
		$this->value = $value;
		return $this;
	}
}