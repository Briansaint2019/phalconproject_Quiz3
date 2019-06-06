<?php

use Phalcon\Mvc\Controller;

class ShowController extends Controller
{
	public function indexAction()
	{
        $id = $this->request->get('id');
       
        $stamps = Stamp::findFirst($id);

        $this->view->stamps = $stamps;
    
    }
    
    public function newAction()
    {
  //      $stamps = new Stamp();
   //     $this->view->stamps = $stamps;
    }

    public function saveAction()
    {  
        $name = $this->request->get('name');
        $description = $this->request->get('description');
        $year = $this->request->get('year');

        // upload the image
        $ext = strtolower(pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION));
        $filename = md5(rand() . date() . localtime() ) . ".$ext";
        copy($_FILES["picture"]["tmp_name"], "images/$filename");
    
        $stamps = new Stamp();
        $stamps->name = $name;
        $stamps->description = $description;
        $stamps->year = $year;
        $stamps->picture = $filename;
        $stamps->save();

        $this->response->redirect('stamps');
    }
   
    public function editAction()
    {
        $id = $this->request->get('id');
        $stamps = Stamp::findFirst($id);
        $this->view->stamps = $stamps;
    }

    public function saveeditAction()
    {
        $id = trim($this->request->get('id'));
        $name = $this->request->get('name');
        $unglued = $this->request ->get('unglued');
        $description = $this->request->get('description');
        $year = $this->request->get('year');
        $quantity = $this->request->get('quantity');
     
        $stamps = Stamp::findFirst($id);
        $stamps->name = $name;
        $stamps->description = $description;
        $stamps->year = $year;
        $stamps->quantity = $quantity;
        $stamps->unglued=$unglued;
        $stamps->save();

        $this->response->redirect('stamps');
    }

    public function deleteAction(){
       $id = $this->request->get('id');
		// find user in the database
		$stamps = Stamp::findFirst($id);
		$stamps->delete();

		// redirect to home
        $this->response->redirect('stamps');
    }
}