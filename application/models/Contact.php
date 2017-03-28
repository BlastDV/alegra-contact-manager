<?php

class subContactType
{
	protected $_client;
	protected $_provider;
	protected $_both;
	
	public function __construct ($input)
	{
		$_both= $_client= $_provider= false;
		
		foreach ($input as $_current)
		{
			if ($_current=="client")	$_client= true;
			if ($_current=="provider") $_provider= true;
		}
		
		$_both= $_client AND $_provider;
	}
	
	public function setCType ($input)
	{
		foreach ($input as $current)
		{
			if ($current=="client")	$_client= true;
			if ($current=="provider") $_provider= true;
		}
		
		$_both= $_client AND $_provider;
	}
	
	public function getCType()
	{
		if ($_both) return array('client', 'provider');
		if ($_client) return array('client', '');
		if ($_provider) return array('', 'provider');
	}
	
	public function getCTypeText()
	{
		if ($_both) return "Cliente / Proveedor";
		if ($_client) return "Cliente";
		if ($_provider) return "Proveedor";
	}
}

class subContactAddress
{
	protected $_address;
	protected $_city;
	
	public function __construct ($input)
	{
		$_address= $input->address;
		$_city=  $input->citi;
	}
	
	public function setAddress($input)
	{
		$_address= $input;
		return $this;
	}
	
	public function setCity($input)
	{
		$_city= $input;
		return $this;
	}
	
	public function getAddress()
	{
		return $_address;
	}
	
	public function getCity()
	{
		return $_city;
	}
}

class subContactSeller
{
	protected $_id;
	protected $_name;
	protected $_identification;
	protected $_observations;
	
	public function __construct ($input)
	{
		/*
		$_id= $input->id;
		$_name= $input->name;
		$_identification= $input->identification;
		$_observations= $input->observations;*/
	}
	
	public function setId ($input)
	{
		$_id= $input;
		return $this;
	}
	
	public function setName ($input)
	{
		$_name= $input;
		return $this;
	}
	
	public function setIdentification($input)
	{
		$_identification= $input;
		return $this;
	}
	
	public function setObservations($input)
	{
		$_observations= $input;
		return $this;
	}
	
	public function getId()
	{
		return $_id;
	}
	
	public function getName()
	{
		return $_name;
	}
	
	public function getIdentification()
	{
		return $_identification;
	}
	
	public function getObservations()
	{
		return $_observations;
	}
}

class subContactTerm
{
	protected $_id;
	protected $_name;
	protected $_days;
	
	public function __construct ($input)
	{
		$_id= $input->id;
		$_name= $input->name;
		$_days= $input->days;
	}
	
	public function setId($input)
	{
		$_id= $input;
		return $this;
	}
	
	public function setName($input)
	{
		$_name= $input;
		return $this;
	}
	
	public function setDays($input)
	{
		$_days= $input;
		return $this;
	}
	
	public function getId()
	{
		return $_id;
	}
	
	public function getName()
	{
		return $_name;
	}
	
	public function getDays()
	{
		return $_days;
	}
}

class subContactPriceList
{
	protected $_id;
	protected $_name;
	
	public function __construct($input)
	{
		$_id= $input->id;
		$_name= $input->name;
	}
	
	public function setId($input)
	{
		$_id= $input;
		return $this;
	}
	
	public function setName($input)
	{
		$_name= $input;
		return $this;
	}
	
	public function getId()
	{
		return $_id;
	}
	
	public function getName()
	{
		return $_name;
	}
}

class subContactIntContact
{
	protected $_id;
	protected $_name;
	protected $_lastName;
	protected $_email;
	protected $_phone;
	protected $_mobile;
	protected $_notify;
	
	public function __construct ($input)
	{
		$_id= $input->id;
		$_name= $input->name;
		$_lastName= $input->lastName;
		$_email= $input->email;
		$_phone= $input->phone;
		$_mobile= $input->mobile;
		$_notify= $input->sendNotifications;
	}
	
	public function setId($input)
	{
		$_id= $input;
		return $this;
	}
	
	public function setName($input)
	{
		$_name= $input;
		return $this;
	}
	
	public function setLastName($input)
	{
		$_lastName= $input;
		return $this;
	}
	
	public function setEmail($input)
	{
		$_email= $input;
		return $this;
	}
	
	public function setPhone($input)
	{
		$_phone= $input;
		return $this;
	}
	
	public function setMobile($input)
	{
		$_mobile= $input;
		return $this;
	}
	
	public function setNotify($input)
	{
		$_notify= $input;
		return $this;
	}
	
	public function getId()
	{
		return $_id;
	}
	
	public function getName()
	{
		return $_name;
	}
	
	public function getLastName()
	{
		return $_lastName;
	}
	
	public function getEmail()
	{
		return $_email;
	}
	
	public function getPhone()
	{
		return $_phone;
	}
	
	public function getMobile()
	{
		return $_mobile;
	}
	
	public function getNotify()
	{
		return $_notify;
	}
}

class Application_Model_Contact
{
	// Atributos de un contacto
	protected $_id;
	protected $_name;
	protected $_identification;
	protected $_email;
	protected $_phonePrimary;
	protected $_phoneSecondary;
	protected $_fax;
	protected $_mobile;
	protected $_type;
	protected $_address;
	protected $_seller;
	protected $_term;
	protected $_priceList;
	protected $_internalContacts;
	
	public function __construct ($input)
	{
		$_id= $input->id;
		$_name= $input->name;
		$_identification= $input->identification;
		$_email= $input->email;
		$_phonePrimary= $input->phonePrimary;
		$_phoneSecondary= $input->phoneSecondary;
		$_fax= $input->fax;
		$_mobile= $input->mobile;
		$_type= new subContactType ($input->type);
		$_seller= new subContactSeller($input->seller);
		$_term= new subContactTerm($input->term);
		$_priceList= new subContactPriceList($input->priceList);
		foreach ($input->internalContacts as $intContact)
		{
			$_internalContacts[]= new subContactIntContact ($intContact);
		}
	}
	
	// Mappers para los setters y getters
	/*public function __set($name, $value)
	{
		$method= 'set'.$name;
		
		if (('mapper' == $name) || !method_exists($this, $method))
		{
			throw new Exception('Propiedad de contacto invalida');
		}
		
		$this->$method($value);
	}*/
	/*
	public function __get($name)
	{
		$method= 'get'.$name;
		
		if (('mapper'== $name) || !method_exists($this, $method))
		{
			throw new Exception('Propiedad de contacto invalida');
		}
		
		return $this->$method();
	}*/
	
	// Getters
	public function getId() { return $this->_id;	}
	public function getName() { return $this->_name; }
	public function getIdentification() { return $this->_identification; }
	public function getEmail() { return $this->_email; }
	public function getPhonePrimary() { return $this->_phonePrimary; }
	public function getPhoneSecondary() { return $this->_phoneSecondary; }
	public function getFax() { return $this->_fax; }
	public function getMobile() { return $this->_mobile; }
	public function getCType() { return $this->_type; }
	public function getAddress() { return $this->_address; }
	public function getSeller() { return $this->_seller; }
	public function getTerm() { return $this->_term; }
	public function getPriceList() { return $this->_priceList; }
	public function getInternalContacts() { return $this->_internalContacts; }
	
	// Setters
	public function setId($id) { $this->_id= $id; return $this; }
	public function setName($name) { $this->_name= $name; return $this; }
	public function setIdentification($ident) { $this->_identification= $ident; return $this; }
	public function setEmail($email) { $this->_email= $email; return $this; }
	public function setPhonePrimary($pprimary) { $this->_phonePrimary= $pprimary; return $this; }
	public function setPhoneSecondary($psecondary) { $this->_phoneSecondary= $psecondary; return $this; }
	public function setFax($fax) { $this->_fax= $fax; return $this; }
	public function setMobile($mobile) { $this->_mobile= $mobile; return $this; }
	public function setCType($type) { $this->_type= $type; return $this; }
	public function setAddress($address) { $this->_address= $address; return $this; }
	public function setSeller($seller) { $this->_seller= $seller; return $this; }
	public function setTerm($term) { $this->_term= $term; return $this; }
	public function setPriceList($priceList) { $this->_priceList= $priceList; return $this; }
	public function setInternalContacts($intContacts) { $this->_internalContacts= $intContacts; return $this; }
}