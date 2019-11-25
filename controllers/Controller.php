<?php

abstract class Controller
{
    protected $data = array();

    protected $view = "";

    protected $head = array('title' => '', 'description' => '');
    
    public function renderView()
    {
		require("helpers/session.php");
        if ($this->view)
        {
            extract($this->data);
            require("views/" . $this->view . ".phtml");
        }
    }

	public function redirect($url)
	{
		header("Location: /$url");
		header("Connection: close");
        exit;
    }
    
    abstract function process($params);

}
