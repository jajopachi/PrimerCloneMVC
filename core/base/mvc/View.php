<?php

namespace core\mvc;

class View
{
    protected $view;
    protected $layout;
    protected $meta;
    protected $controller;


    public function __construct($view, $layout, $meta, $controller)
    {
        $this->view = $view;
        $this->layout = $layout;
        $this->meta = $meta;
        $this->controller = $controller;
    }

    public function renderHTML($data)
    {
        if(is_array($data))
        {
            extract($data);
        }

        $viewFile = VIEWS . "/{$this->controller}/" . $this->view . ".php";

        if(file_exists($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        }
        require_once LAYOUTS . "/" . $this->layout . ".php";
    }
}