<?php //-->
/*
 * This file is part of the Block package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Block\Field;

use Eden\Block\Argument;

/**
 * Textarea Field Block
 *
 * @vendor Eden
 * @package Block
 * @author Christian Blanquera cblanquera@openovate.com
 */
class Wysiwyg extends Textarea 
{
	protected static $loaded = false;
	
	/**
	 * Returns the template variables in key value format
	 *
	 * @param array data
	 * @return array
	 */
	public function getVariables() 
	{
		if(isset($this->attributes['class'])) {
			$this->attributes['class'] = trim($this
			->attributes['class'].' eden-field-wysiwyg form-control');
		} else {
			$this->attributes['class'] = 'eden-field-wysiwyg form-control';
		}
		
		$loaded = self::$loaded;
		self::$loaded = true;
		
		return array(
			'loaded'		=> $loaded,
			'options'		=> $this->options,
			'attributes' 	=> $this->attributes,
			'value'			=> $this->value);
	}
	
	/**
	 * Returns a template file
	 * 
	 * @param array data
	 * @return string
	 */
	public function getTemplate() 
	{
		return __DIR__.'/wysiwyg.phtml';
	}
	
	/**
	 * Set Options
	 *
	 * @param string|array
	 * @param scalar
	 * @return this
	 */
	public function setOptions($option, $value = null) 
	{
		Argument::i()
			->test(1, 'array', 'string')
			->test(2, 'scalar', 'null');
		
		if(is_array($option)) {
			$this->options = $option;
			return $this;
		}
		
		$this->options[$option] = $value;
		return $this;
	}
	
	protected $options = array(
		'classes' => array( 
			'wysiwyg-clear-both'			=> 1, 'wysiwyg-clear-left'			=> 1,
			'wysiwyg-clear-right'			=> 1, 'wysiwyg-color-aqua'			=> 1,
			'wysiwyg-color-black'			=> 1, 'wysiwyg-color-blue'			=> 1,
			'wysiwyg-color-fuchsia'			=> 1, 'wysiwyg-color-gray'			=> 1,
			'wysiwyg-color-green'			=> 1, 'wysiwyg-color-lime'			=> 1,
			'wysiwyg-color-maroon'			=> 1, 'wysiwyg-color-navy'			=> 1,
			'wysiwyg-color-olive'			=> 1, 'wysiwyg-color-purple'		=> 1,
			'wysiwyg-color-red'				=> 1, 'wysiwyg-color-silver'		=> 1,
			'wysiwyg-color-teal'			=> 1, 'wysiwyg-color-white'			=> 1,
			'wysiwyg-color-yellow'			=> 1, 'wysiwyg-float-left'			=> 1,
			'wysiwyg-float-right'			=> 1, 'wysiwyg-font-size-large'		=> 1,
			'wysiwyg-font-size-larger'		=> 1, 'wysiwyg-font-size-medium'	=> 1,
			'wysiwyg-font-size-small'		=> 1, 'wysiwyg-font-size-smaller'	=> 1,
			'wysiwyg-font-size-x-large'		=> 1, 'wysiwyg-font-size-x-small'	=> 1,
			'wysiwyg-font-size-xx-large'	=> 1, 'wysiwyg-font-size-xx-small'	=> 1,
			'wysiwyg-text-align-center'		=> 1, 'wysiwyg-text-align-justify'	=> 1,
			'wysiwyg-text-align-left'		=> 1, 'wysiwyg-text-align-right'	=> 1 ),
		
		'tags' => array( 
			'tr'			=> array('add_class' => array('align' => 'align_text')),
			'strike'		=> array('remove' => 1),
			'form'			=> array('rename_tag' => 'div'),
			'rt'			=> array('rename_tag' => 'span'),
			'code'			=> array(),
			'acronym'		=> array('rename_tag' => 'span'),
			'br'			=> array('add_class' => array('clear' => 'clear_br')),
			'details'		=> array('rename_tag' => 'div'),
			'h4'			=> array('add_class' => array('align' => 'align_text')),
			'em'			=> array(),
			'title'			=> array('remove' => 1),
			'multicol'		=> array('rename_tag' => 'div'),
			'figure'		=> array('rename_tag' => 'div'),
			'xmp'			=> array('rename_tag' => 'span'),
			'small'			=> array(
				'rename_tag' => 'span', 
				'set_class' => 'wysiwyg-font-size-smaller'),
			'area'			=> array('remove' => 1),
			'time'			=> array('rename_tag' => 'span'),
			'dir'			=> array('rename_tag' => 'ul'),
			'bdi'			=> array('rename_tag' => 'span'),
			'command'		=> array('remove' => 1),
			'ul'			=> array(),
			'progress'		=> array('rename_tag' => 'span'),
			'dfn'			=> array('rename_tag' => 'span'),
			'iframe'		=> array('remove' => 1),
			'figcaption'	=> array('rename_tag' => 'div'),
			'a'				=> array(
				'check_attributes' => array('href' => 'url'), 
				'set_attributes' => array('rel' => 'nofollow', 'target' => '_blank')), 
			'img'			=> array(
				'check_attributes' => array(
					'width' 	=> 'numbers', 
					'alt' 		=> 'alt', 
					'src' 		=> 'url', 
					'height' 	=> 'numbers'),
				'add_class'	=> array('align' => 'align_img')),
			'rb'			=> array('rename_tag' => 'span'),
			'footer'		=> array('rename_tag' => 'div'),
			'noframes'		=> array('remove' => 1),
			'abbr'			=> array('rename_tag' => 'span'),
			'u'				=> array(),
			'bgsound'		=> array('remove' => 1),
			'sup'			=> array('rename_tag' => 'span'),
			'address'		=> array('rename_tag' => 'div'),
			'basefont'		=> array('remove' => 1),
			'nav'			=> array('rename_tag' => 'div'),
			'h1'			=> array('add_class' => array('align' => 'align_text')),
			'head'			=> array('remove' => 1),
			'tbody'			=> array('add_class' => array('align' => 'align_text')),
			'dd'			=> array('rename_tag' => 'div'),
			's'				=> array('rename_tag' => 'span'),
			'li'			=> array(),
			'td'			=> array(
				'check_attributes' => array('rowspan' => 'numbers', 'colspan' => 'numbers'), 
				'add_class' => array('align' => 'align_text')),
			'object'		=> array('remove' => 1),
			'div'			=> array('add_class' => array('align' => 'align_text')),
			'option'		=> array('rename_tag' => 'span'),
			'select'		=> array('rename_tag' => 'span'),
			'i'				=> array(),
			'track'			=> array('remove' => 1),
			'wbr'			=> array('remove' => 1),
			'fieldset'		=> array('rename_tag' => 'div'),
			'big'			=> array(
				'rename_tag' => 'span', 
				'set_class' => 'wysiwyg-font-size-larger'),
			'button'		=> array('rename_tag' => 'span'),
			'noscript'		=> array('remove' => 1),
			'svg'			=> array('remove' => 1),
			'input'			=> array('remove' => 1),
			'table'			=> array(),
			'keygen'		=> array('remove' => 1),
			'h5'			=> array('add_class' => array('align' => 'align_text')),
			'meta'			=> array('remove' => 1),
			'map'			=> array('rename_tag' => 'div'),
			'isindex'		=> array('remove' => 1),
			'mark'			=> array('rename_tag' => 'span'),
			'caption'		=> array('add_class' => array('align' => 'align_text')),
			'tfoot'			=> array('add_class' => array('align' => 'align_text')),
			'base'			=> array('remove' => 1),
			'video'			=> array('remove' => 1),
			'strong'		=> array(),
			'canvas'		=> array('remove' => 1),
			'output'		=> array('rename_tag' => 'span'),
			'marquee'		=> array('rename_tag' => 'span'),
			'b'				=> array(),
			'q'				=> array('check_attributes' => array('cite' => 'url')),
			'applet'		=> array('remove' => 1),
			'span'			=> array(),
			'rp'			=> array('rename_tag' => 'span'),
			'spacer'		=> array('remove' => 1),
			'source'		=> array('remove' => 1),
			'aside'			=> array('rename_tag' => 'div'),
			'frame'			=> array('remove' => 1),
			'section'		=> array('rename_tag' => 'div'),
			'body'			=> array('rename_tag' => 'div'),
			'ol'			=> array(),
			'nobr'			=> array('rename_tag' => 'span'),
			'html'			=> array('rename_tag' => 'div'),
			'summary'		=> array('rename_tag' => 'span'),
			'var'			=> array('rename_tag' => 'span'),
			'del'			=> array('remove' => 1),
			'blockquote'	=> array('check_attributes' => array('cite' => 'url')),
			'style'			=> array('remove' => 1),
			'device'		=> array('remove' => 1),
			'meter'			=> array('rename_tag' => 'span'),
			'h3'			=> array('add_class' => array('align' => 'align_text')),
			'textarea'		=> array('rename_tag' => 'span'),
			'embed'			=> array('remove' => 1),
			'hgroup'		=> array('rename_tag' => 'div'),
			'font'			=> array(
				'rename_tag' => 'span', 
				'add_class' => array('size' => 'size_font')),
			'tt'			=> array('rename_tag' => 'span'),
			'noembed'		=> array('remove' => 1),
			'thead'			=> array('add_class' => array('align' => 'align_text')),
			'blink'			=> array('rename_tag' => 'span'),
			'plaintext'		=> array('rename_tag' => 'span'),
			'xml'			=> array('remove' => 1),
			'h6'			=> array('add_class' => array('align' => 'align_text')),
			'param'			=> array('remove' => 1),
			'th'			=> array(
							'check_attributes' => array(
								'rowspan' => 'numbers',
								'colspan' => 'numbers'),
							'add_class' => array('align' => 'align_text')),
			'legend'		=> array('rename_tag' => 'span'),
			'hr'			=> array(),
			'label'			=> array('rename_tag' => 'span'),
			'dl'			=> array('rename_tag' => 'div'),
			'kbd'			=> array('rename_tag' => 'span'),
			'listing'		=> array('rename_tag' => 'div'),
			'dt'			=> array('rename_tag' => 'span'),
			'nextid'		=> array('remove' => 1),
			'pre'			=> array(),
			'center'		=> array('rename_tag' => 'div', 'set_class' => 'wysiwyg-text-align-center'),
			'audio'			=> array('remove' => 1),
			'datalist'		=> array('rename_tag' => 'span'),
			'samp'			=> array('rename_tag' => 'span'),
			'col'			=> array('remove' => 1),
			'article'		=> array('rename_tag' => 'div'),
			'cite'			=> array(),
			'link'			=> array('remove' => 1),
			'script'		=> array('remove' => 1),
			'bdo'			=> array('rename_tag' => 'span'),
			'menu'			=> array('rename_tag' => 'ul'),
			'colgroup'		=> array('remove' => 1),
			'ruby'			=> array('rename_tag' => 'span'),
			'h2'			=> array('add_class' => array('align' => 'align_text')),
			'ins'			=> array('rename_tag' => 'span'),
			'p'				=> array('add_class' => array('align' => 'align_text')),
			'sub'			=> array('rename_tag' => 'span'),
			'comment'		=> array('remove' => 1),
			'frameset'		=> array('remove' => 1),
			'optgroup'		=> array('rename_tag' => 'span'),
			'header'		=> array('rename_tag' => 'div' )));
	
}