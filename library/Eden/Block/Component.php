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

use Eden\Block\Component\Hero;
use Eden\Block\Component\Pagination;
use Eden\Block\Component\Sort;
use Eden\Block\Component\Tab;
use Eden\Block\Component\Tree;

/**
 * Component Blocks
 *
 * @vendor Eden
 * @package Block
 * @author Christian Blanquera cblanquera@openovate.com
 */
class Component extends CoreBase 
{
	const INSTANCE = 1;
	
	/**
	 * Returns a hero
	 * 
	 * @param array
	 * @param scalar|null
	 * @return Eden\Block\Hero
	 */
	public function hero($images, $delay = null) 
	{
		Argument::i()
			->argument(1,'array')
			->argument(2, 'scalar', 'null');

			
		$field = Hero::i();
		
		if(!is_null($delay) and is_numeric($delay) ) {
			$field->setDelay($delay);
		}

		if(!is_null($images)) {
			$field->setImages($images);
		}

		return $field;
	}

	/**
	 * Returns table sort block
	 *
	 * @param array
	 * @param string
	 * @param string
	 * @param string|null
	 * @return Eden\Block\Sort
	 */
	public function sort(array $query, $key, $label, $url = null) 
	{
		Argument::i()
			->test(2, 'string')
			->test(3, 'string')
			->test(4, 'string', 'null');
			
		$block = Sort::i($query, $key, $label);
		
		if($url) {
			$block->setUrl($url);
		}
		
		return $block;
	}
	
	/**
	 * Returns pagination block
	 *
	 * @param int
	 * @return Eden\Block\Pagination
	 */
	public function pagination($total) 
	{
		Argument::i()->test(1, 'int');
		return Pagination::i($total);
	}
	
	/**
	 * Returns a tree view block
	 *
	 * @param string|null
	 * @return Eden\Block\Tree
	 */
	public function tree($root = null) 
	{
		Argument::i()->test(1, 'string', 'null');
		return Tree::i($root);
	}
}