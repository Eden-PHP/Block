<?php //-->
/*
 * This file is part of the Block package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Block;

use Eden\Core\Base as CoreBase;
use Eden\Template\Base as Template;

/**
 * The base class for all classes wishing to integrate with Eden.
 * Extending this class will allow your methods to seemlessly be
 * overloaded and overrided as well as provide some basic class
 * loading patterns.
 *
 * @vendor Eden
 * @package Block
 * @author Christian Blanquera cblanquera@openovate.com
 */
abstract class Base extends CoreBase
{
	protected static $global = array();
	
	protected $template = null;
	
	/**
	 * Magic: Try to call render
	 *
	 * @return string
	 */
	public function __toString() 
	{
		try {
			return (string) $this->render();
		} catch(Exception $e) {
			Eden\Core\Factory::i()
				->exception()
				->handler($e);
		}
		
		return '';
	}
	
	/**
	 * returns location of template file
	 *
	 * @return string
	 */
	public function getTemplate() 
	{
		return $this->template;
	}
	
	/**
	 * returns variables used for templating
	 *
	 * @return array
	 */
	abstract public function getVariables();
	
	/**
	 * Transform block to string
	 *
	 * @param array
	 * @return string
	 */
	public function render() 
	{
		return Template::i()
			->set($this->getVariables())
			->parsePhp($this->getTemplate());
	}
}