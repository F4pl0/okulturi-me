<?php
class RouterController extends Controller
{
	protected $controller;

	private function parseUrl($url)
	{
		$parsedUrl = parse_url($url);
		$parsedUrl["path"] = ltrim($parsedUrl["path"], "/");
		$parsedUrl["path"] = trim($parsedUrl["path"]);
		$explodedUrl = explode("/", $parsedUrl["path"]);
		return $explodedUrl;
	}

	private function dashesToCamel($text)
	{
		$text = str_replace('-', ' ', $text);
		$text = ucwords($text);
		$text = str_replace(' ', '', $text);
		return $text;
	}

	public function process($params)
	{
		$parsedUrl = $this->parseUrl($params[0]);

		if (empty($parsedUrl[0]))
			$this->redirect('home');
		
		// Odvoji se backend API
		if ($parsedUrl[0] == "api") {
			if(file_exists("api/".$this->dashesToCamel($parsedUrl[1])."/".$this->dashesToCamel($parsedUrl[2]).".php")){
				require("api/".$this->dashesToCamel($parsedUrl[1])."/".$this->dashesToCamel($parsedUrl[2]).".php");

			} else {
				header("HTTP/1.0 404 Not Found");
			}
			return;
		}

		$controllerClass = $this->dashesToCamel(array_shift($parsedUrl)) . 'Controller';

		if (file_exists('controllers/' . $controllerClass . '.php'))
			$this->controller = new $controllerClass;
		else
			$this->redirect('error');

		$this->controller->process($parsedUrl);

		$this->data['title'] = $this->controller->head['title'];
		$this->data['description'] = $this->controller->head['description'];
		
		$this->view = 'layout';
	}
}