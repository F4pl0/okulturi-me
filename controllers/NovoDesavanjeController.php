<?php
class NovoDesavanjeController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("HTTP/1.0 200 Success");
        // HTML header
        $this->head['title'] = "Kreiraj Desavanje";
        // Set the template
        $this->view = 'novo-desavanje';
    }
}