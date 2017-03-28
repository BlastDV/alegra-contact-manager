<?php

class Application_Model_ContactMapper
{
	// Esto nos permite recuperar un unico contacto del API y enviarlo a la vista
	public function getSpecificContact($id)
	{
		$ContactsClient= $GLOBALS["AlegraAPI"]["ContactsClient"];
		$ContactsClient->setUri($GLOBALS["AlegraAPI"]["contactsAPI"]."/".$id);
		
		try
		{
			$response= $ContactsClient->request("GET");
		}
		catch (Exception $ex)
		{
			$response= "Error en la conexion al API: ".$ex->getMessage();
		}
		
		$contact= new Application_Model_Contact(json_decode($response->getBody()));
		return $contact;
	}
	
	// Esto recupera todos los contactos de Alegra
	public function fetchAll()
	{
		$ContactsClient= $GLOBALS["AlegraAPI"]["ContactsClient"];
		try
		{
			$response= $ContactsClient->request("GET");
		}
		catch (Exception $ex)
		{
			$response= "Error en la conexion al API: ".$ex->getMessage();
		}
		
		$contacts= json_decode($response->getBody());
		
		return $contacts;
	}
	
	// Esto permite eliminar un contacto de alegra
	public function removeContact($id)
	{
		$ContactsClient= $GLOBALS["AlegraAPI"]["ContactsClient"];
		$ContactsClient->setUri($GLOBALS["AlegraAPI"]["contactsAPI"]."/".$id);
		
		try
		{
			$response= $ContactsClient->request('DELETE');
		}
		catch (Exception $ex)
		{
			$response= "Error en la conexion al API: ".$ex->getMessage();
		}
		
		
		
	}


}

