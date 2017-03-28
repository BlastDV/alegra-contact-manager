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
			$response= $ContactsClient->request();
		}
		catch (Exception $ex)
		{
			$response= "Error en la conexion al API: ".$ex->getMessage();
		}
		
		$contact= new Application_Model_Contact(json_decode($response->getBody()));
		return $contact;
	}
	
	public function fetchAll()
	{
		$ContactsClient= $GLOBALS["AlegraAPI"]["ContactsClient"];
		try
		{
			$response= $ContactsClient->request();
		}
		catch (Exception $ex)
		{
			$response= "Error en la conexion al API: ".$ex->getMessage();
		}
		
		$contacts= json_decode($response->getBody());
		
		/*foreach($resultSet as $row)
		{
			$entry= new Application_Model_Guestbook();
			$entry->setId($row->id)
					->setEmail($row->email)
					->setComment($row->comment)
					->setCreated($row->created);
					
			$entries[]= $entry;
		}*/
		
		return $contacts;
	}


}

