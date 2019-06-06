<?php

use Phalcon\Mvc\Controller;

class AlbumController extends Controller
{
	public function indexAction()
	{
        $stamps = Stamp::find();
       

        $this->view->stamps = $stamps;
   
     
       
	}
}