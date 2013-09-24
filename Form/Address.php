<?php //-->
/*
 * This file is part of the Block package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Block\Form;

use Eden\Block\Base;
use Eden\Block\Argument;

/**
 * Address Form Block
 *
 * @vendor Eden
 * @package Block
 * @author Christian Blanquera cblanquera@openovate.com
 */
class Address extends Base 
{
	protected $data	= array(
		'address_street_1' => null,
		'address_street_2' => null,
		'address_neighborhood' => null,
		'address_city' => null,
		'address_state'	=> null,
		'address_region' => null,
		'address_postal' => null,
		'address_country' => null,
		'address_phone'	=> null);
	
	protected $required	= array(
		'address_street_1',
		'address_city',
		'address_state',
		'address_region');
	
	protected $show	= array(
		'address_street_1' => true,
		'address_street_2' => true,
		'address_neighborhood' => true,
		'address_city' => true,
		'address_state'	=> true,
		'address_region' => true,
		'address_postal' => true,
		'address_country' => true,
		'address_phone'	=> true);
	
	protected $labels = array(
		'address_street_1' => 'Street',
		'address_street_2' => '',
		'address_neighborhood' => 'Neighborhood',
		'address_city' => 'City',
		'address_state'	=> 'State',
		'address_region' => 'Region',
		'address_postal' => 'Postal',
		'address_country' => 'Country',
		'address_phone'	=> 'Phone');
	
	protected $pattern = null;
	protected $errors = array();
	protected $holders = array();
	protected $neighborhoods = array();
	protected $states = array();
	protected $regions = array();
	protected $countries = array();
	
	/**
	 * Returns a template file
	 * 
	 * @param array data
	 * @return string
	 */
	public function getTemplate() 
	{
		return __DIR__.'/address.phtml';
	}
	
	/**
	 * Returns the template variables in key value format
	 *
	 * @param array data
	 * @return array
	 */
	public function getVariables() 
	{
		if(empty($this->countries)) {
			$this->countries = eden('country')->getList();
		}
		
		return array(
			'pattern' => $this->pattern,
			'fields' => $this->show,
			'labels' => $this->labels,
			'data' => $this->data,
			'errors' => $this->errors,
			'holders' => $this->holders,
			'states' => $this->states,
			'regions' => $this->regions,
			'required' => $this->required,
			'neighborhoods' => $this->neighborhoods,
			'countries' => $this->countries);
	}
	
	/**
	 * Prevent rendering of country
	 *
	 * @return Eden\Block\Form\Address
	 */
	public function noCountry() 
	{
		$this->show['address_country'] = false;
		return $this;
	}
	
	/**
	 * Prevent rendering of neighborhood
	 *
	 * @return Eden\Block\Form\Address
	 */
	public function noNeighborhood() 
	{
		$this->show['address_neighborhood'] = false;
		return $this;
	}
	
	/**
	 * Prevent rendering of phone
	 *
	 * @return Eden\Block\Form\Address
	 */
	public function noPhone() 
	{
		$this->show['address_phone'] = false;
		return $this;
	}
	
	/**
	 * Prevent rendering of neighborhood
	 *
	 * @return Eden\Block\Form\Address
	 */
	public function noPostal() 
	{
		$this->show['address_postal'] = false;
		return $this;
	}
	
	/**
	 * Prevent rendering of region
	 *
	 * @return Eden\Block\Form\Address
	 */
	public function noRegion() 
	{
		$this->show['address_region'] = false;
		return $this;
	}
	
	/**
	 * Prevent rendering of state
	 *
	 * @return Eden\Block\Form\Address
	 */
	public function noState() 
	{
		$this->show['address_state'] = false;
		return $this;
	}
	
	/**
	 * Prevent rendering of streets
	 *
	 * @return Eden\Block\Form\Address
	 */
	public function noStreets() 
	{
		$this->show['address_street_1'] = false;
		$this->show['address_street_2'] = false;
		return $this;
	}
	
	/**
	 * Prevent rendering of street 2
	 *
	 * @return Eden\Block\Form\Address
	 */
	public function noStreet2() 
	{
		$this->show['address_street_2'] = false;
		return $this;
	}
	
	/**
	 * Sets the countries list
	 *
	 * @param array
	 * @return Eden\Block\Form\Address
	 */
	public function setCountries(array $countries) 
	{
		$this->countries = $countries;
		return $this;
	}
	
	/**
	 * Sets form data
	 *
	 * @param array|string
	 * @return Eden\Block\Form\Address
	 */
	public function setData($data) 
	{
		if(is_array($data)) {
			$this->data = $data;
		}
		
		$args = func_get_args();
		$this->data[$args[0]] = $args[1];
		
		return $this;
	}
	
	/**
	 * Sets errors
	 *
	 * @param array|string
	 * @return Eden\Block\Form\Address
	 */
	public function setErrors($errors) 
	{
		if(is_array($errors)) {
			$this->errors = $errors;
			return $this;
		}
		
		$args = func_get_args();
		$this->errors[$args[0]] = $args[1];
		
		return $this;
	}
	
	/**
	 * Sets phone pattern
	 *
	 * @param string|array
	 * @return Eden\Block\Form\Address
	 */
	public function setPhonePattern($pattern) 
	{
		$this->pattern = $pattern;
		
		return $this;
	}
	
	/**
	 * Sets place holders
	 *
	 * @param string|array
	 * @return Eden\Block\Form\Address
	 */
	public function setHolders($holders) 
	{
		if(is_array($holders)) {
			$this->holders = $holders;
		}
		
		$args = func_get_args();
		$this->holders[$args[0]] = $args[1];
		
		return $this;
	}
	
	/**
	 * Sets labels
	 *
	 * @param string|array
	 * @return Eden\Block\Form\Address
	 */
	public function setLabels($labels) 
	{
		if(is_array($labels)) {
			$this->labels = $labels;
		}
		
		$args = func_get_args();
		$this->labels[$args[0]] = $args[1];
		
		return $this;
	}
	
	/**
	 * Sets the neighborhood list
	 *
	 * @param array
	 * @return Eden\Block\Form\Address
	 */
	public function setNeighborhoods(array $neighborhoods) 
	{
		$this->neighborhoods = array_values($neighborhoods);
		return $this;
	}
	
	/**
	 * Sets the region list
	 *
	 * @param array
	 * @return Eden\Block\Form\Address
	 */
	public function setRegions(array $regions) 
	{
		$this->regions = array_values($regions);
		return $this;
	}
	
	/**
	 * Sets the required fields
	 *
	 * @param array
	 * @return Eden\Block\Form\Address
	 */
	public function setRequired(array $required) 
	{
		$this->required = array_values($required);
		return $this;
	}
	
	/**
	 * Sets the states list
	 *
	 * @param array
	 * @return Eden\Block\Form\Address
	 */
	public function setStates(array $states) 
	{
		$this->states = array_values($states);
		return $this;
	}
	
	/**
	 * Shows only the specified in the order specified
	 *
	 * @param array
	 * @return Eden\Block\Form\Address
	 */
	public function show(array $fields) 
	{
		$this->show = array();
		
		foreach($fields as $field) {
			$this->show[$field] = true;
		}
		
		return $this;
	}
	
}