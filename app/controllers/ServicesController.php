<?php

namespace app\controllers;

use core\mvc\Controller;

class ServicesController extends Controller
{
    public $module = "main";
    public function privacyPolicyAction()
    {

    }

    public function feedbackAction()
    {

    }

    public function advertiseAction()
    {

    }

    public function depositAction()
    {
        $this->module = "none";

        $module = $this->module;

        $this->setData(compact("module"));
    }
}