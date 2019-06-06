<?php

use Phalcon\Mvc\Controller;

class StampsController extends Controller
{
	public function indexAction()
	{
          $stamps = Stamp ::find();

          // $page = $this->request->get('page');

          // send data to the view
          $this->view->stamps = $stamps;
          // $this->view->page = $page;
	}
}

?>