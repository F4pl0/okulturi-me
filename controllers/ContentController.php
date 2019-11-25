<?php
class ContentController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("HTTP/1.0 200 Success");
        // HTML header
        $this->head['title'] = "Dobrodosli u Okulturi.me";
        // Set the template
        $this->view = 'content';
    }
}