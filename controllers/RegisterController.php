<?php
class RegisterController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("HTTP/1.0 200 Success");
        // HTML header
        $this->head['title'] = "Registruj se na okulturi.me";
        // Set the template
        $this->view = 'register';
    }
}