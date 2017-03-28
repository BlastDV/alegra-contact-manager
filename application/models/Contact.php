<?php

class subContactType
{
	protected $_client;
	protected $_provider;
	protected $_both;
	
	public function __construct ($input)
	{
		$this->_both= $this->_client= $this->_provider= false;
		
		foreach ($input as $_current)
		{
			if ($_current=="client")	$this->_client= true;
			if ($_current=="provider") $this->_provider= true;
		}
		
		$this->_both= $this->_client AND $this->_provider;
	}
	
	public function setCType ($input)
	{
		foreach ($input as $current)
		{
			if ($current=="client")	$this->_client= true;
			if ($current=="provider") $this->_provider= true;
		}
		
		$this->_both= $this->_client AND $this->_provider;
	}
	
	public function getCType()
	{
		if ($this->_both) return array('client', 'provider');
		if ($this->_client) return array('client', '');
		if ($this->_provider) return array('', 'provider');
	}
	
	public function getCTypeText()
	{
		if ($this->_both) return "Cliente / Proveedor";
		if ($this->_client) return "Cliente";
		if ($this->_provider) return "Proveedor";
	}
}

class subContactAddress
{
	protected $_address;
	protected $_city;
	
	public function __construct ($input)
	{
		if ($input!=null)
		{
			$this->_address= $input->address;
			$this->_city=  $input->city;
		}
	}
	
	public function setAddress($input)
	{
		$this->_address= $input;
		return $this;
	}
	
	public function setCity($input)
	{
		$this->_city= $input;
		return $this;
	}
	
	public function getAddress()
	{
		return $this->_address;
	}
	
	public function getCity()
	{
		return $this->_city;
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
		if ($input!=null)
		{
			$this->_id= $input->id;
			$this->_name= $input->name;
			$this->_identification= $input->identification;
			$this->_observations= $input->observations;
		}
	}
	
	public function setId ($input)
	{
		$this->_id= $input;
		return $this;
	}
	
	public function setName ($input)
	{
		$this->_name= $input;
		return $this;
	}
	
	public function setIdentification($input)
	{
		$this->_identification= $input;
		return $this;
	}
	
	public function setObservations($input)
	{
		$this->_observations= $input;
		return $this;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	public function getName()
	{
		return $this->_name;
	}
	
	public function getIdentification()
	{
		return $this->_identification;
	}
	
	public function getObservations()
	{
		return $this->_observations;
	}
}

class subContactTerm
{
	protected $_id;
	protected $_name;
	protected $_days;
	
	public function __construct ($input)
	{
		if ($input!=null)
		{
			$this->_id= $input->id;
			$this->_name= $input->name;
			$this->_days= $input->days;
		}
	}
	
	public function setId($input)
	{
		$this->_id= $input;
		return $this;
	}
	
	public function setName($input)
	{
		$this->_name= $input;
		return $this;
	}
	
	public function setDays($input)
	{
		$this->_days= $input;
		return $this;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	public function getName()
	{
		return $this->_name;
	}
	
	public function getDays()
	{
		return $this->_days;
	}
}

class subContactPriceList
{
	protected $_id;
	protected $_name;
	
	public function __construct($input)
	{
		if ($input!=null)
		{
			$this->_id= $input->id;
			$this->_name= $input->name;
		}
	}
	
	public function setId($input)
	{
		$this->_id= $input;
		return $this;
	}
	
	public function setName($input)
	{
		$this->_name= $input;
		return $this;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	public function getName()
	{
		return $this->_name;
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
		if ($input!=null)
		{
			$this->_id= $input->id;
			$this->_name= $input->name;
			$this->_lastName= $input->lastName;
			$this->_email= $input->email;
			$this->_phone= $input->phone;
			$this->_mobile= $input->mobile;
			$this->_notify= $input->sendNotifications;
		}
	}
	
	public function setId($input)
	{
		$this->_id= $input;
		return $this;
	}
	
	public function setName($input)
	{
		$this->_name= $input;
		return $this;
	}
	
	public function setLastName($input)
	{
		$this->_lastName= $input;
		return $this;
	}
	
	public function setEmail($input)
	{
		$this->_email= $input;
		return $this;
	}
	
	public function setPhone($input)
	{
		$this->_phone= $input;
		return $this;
	}
	
	public function setMobile($input)
	{
		$this->_mobile= $input;
		return $this;
	}
	
	public function setNotify($input)
	{
		$this->_notify= $input;
		return $this;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	public function getName()
	{
		return $this->_name;
	}
	
	public function getLastName()
	{
		return $this->_lastName;
	}
	
	public function getEmail()
	{
		return $this->_email;
	}
	
	public function getPhone()
	{
		return $this->_phone;
	}
	
	public function getMobile()
	{
		return $this->_mobile;
	}
	
	public function getNotify()
	{
		return $this->_notify;
	}
	
	public function getTNotify()
	{
		return $this->_notify ? "Si" : "No";
	}
}

class Application_Model_Contact
{
	// Atributos de un contacto
	protected $_id;
	protected $_name= "pepito";
	protected $_identification;
	protected $_email;
	protected $_phonePrimary;
	protected $_phoneSecondary;
	protected $_fax;
	protected $_mobile;
	protected $_observations;
	protected $_type;
	protected $_address;
	protected $_seller;
	protected $_term;
	protected $_priceList;
	protected $_internalContacts;
	
	public function __construct ($input)
	{
		if ($input!=null)
		{
			$this->_id= $input->id;
			$this->_name= $input->name;
			$this->_identification= $input->identification;
			$this->_email= $input->email;
			$this->_phonePrimary= $input->phonePrimary;
			$this->_phoneSecondary= $input->phoneSecondary;
			$this->_fax= $input->fax;
			$this->_mobile= $input->mobile;
			$this->_observations= $input->observations;
			$this->_type= new subContactType ($input->type);
			$this->_address= new subContactAddress ($input->address);
			$this->_seller= new subContactSeller($input->seller);
			$this->_term= new subContactTerm($input->term);
			$this->_priceList= new subContactPriceList($input->priceList);
			$this->_internalContacts= array();
			foreach ($input->internalContacts as $intContact)
			{
				$this->_internalContacts[]= new subContactIntContact ($intContact);
			}
		}
	}
	
	// Mappers para los setters y getters
	public function __set($name, $value)
	{
		$method= 'set'.$name;
		
		if (('mapper' == $name) || !method_exists($this, $method))
		{
			throw new Exception('Propiedad de contacto invalida');
		}
		
		$this->$method($value);
	}
	
	public function __get($name)
	{
		$method= 'get'.$name;
		
		if (('mapper'== $name) || !method_exists($this, $method))
		{
			throw new Exception('Propiedad de contacto invalida');
		}
		
		return $this->$method();
	}
	
	// Getters
	public function getId() { return $this->_id;	}
	public function getName() { return $this->_name; }
	public function getIdentification() { return $this->_identification; }
	public function getEmail() { return $this->_email; }
	public function getPhonePrimary() { return $this->_phonePrimary; }
	public function getPhoneSecondary() { return $this->_phoneSecondary; }
	public function getFax() { return $this->_fax; }
	public function getMobile() { return $this->_mobile; }
	public function getObservations() { return $this->_observations; }
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
	public function setObservations($obs) { $this->_observations= $obs; return $this; }
	public function setCType($type) { $this->_type= $type; return $this; }
	public function setAddress($address) { $this->_address= $address; return $this; }
	public function setSeller($seller) { $this->_seller= $seller; return $this; }
	public function setTerm($term) { $this->_term= $term; return $this; }
	public function setPriceList($priceList) { $this->_priceList= $priceList; return $this; }
	public function setInternalContacts($intContacts) { $this->_internalContacts= $intContacts; return $this; }
}