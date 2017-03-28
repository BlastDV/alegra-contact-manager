<?php

class ContactsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		include ("AlegraAPI.php");
    }

    public function indexAction()
    {
		$contactlist= new Application_Model_ContactMapper();
		$this->view->contacts= $contactlist->fetchAll();
    }

    public function aboutAction()
    {
        // action body
    }

    public function viewAction()
    {
		$id= $this->getRequest()->getParam('id');
        $contact= new Application_Model_ContactMapper();
		$this->view->contact= $contact->getSpecificContact($id);
    }

    public function deleteAction()
    {
        $id= $this->getRequest()->getParam('id');
		$contact= new Application_Model_ContactMapper();
		$contact->removeContact($id);
		$this->redirect('/contacts/index');
    }


}







