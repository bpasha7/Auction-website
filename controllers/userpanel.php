<?php
class UserPanel extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->view->render('userpanel/panel', true);
	}
	public function about()
	{
		$this->model->about();
	}
	public function lots()
	{
		$this->model->lots();
	}

}
?>