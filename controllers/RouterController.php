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
			$this->redirect('article/home');

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