<?php
class MojaDesavanjaController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("HTTP/1.0 200 Success");
        // HTML header
        $this->head['title'] = "Moja Desavanja";
        // Set the template
        $this->view = 'moja-desavanja';
    }
}