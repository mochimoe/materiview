<?php

use Phalcon\Mvc\Controller;
use Phalcon\Flash\Direct;
use Phalcon\Mvc\View;

class BuahController extends Controller
{
    public function initialize(){
        $this->view->setTemplateBefore('common');

    }
    public function bijiAction($inibuah='apel')
    {
        $this->view->setVar('inibuah', $inibuah);
        $this->view->disable();
//RENDER ACTION VIEW SAJA
        // $this->view->setRenderLevel(
        //     View::LEVEL_ACTION_VIEW
        // );
        //PICKING VIEW
        //$this->view->pick('/layouts/common');
        //DISABLE LAYOUT CONTROLLER
        // $this->view->disableLevel(
        //     View::LEVEL_LAYOUT
        // );

        //DISABLE MAIN LAYOUT
        // $this->view->disableLevel(
        //     View::LEVEL_MAIN_LAYOUT
        // );
        
        //RENDER HINGGA MAIN LAYOUT
        // $this->view->setRenderLevel(
        //  View::LEVEL_MAIN_LAYOUT
        //     );

        // LEVEL LAYOUT
        // $this->view->setRenderLevel(
        //     View::LEVEL_LAYOUT
        // );
        // LEVEL TEMPLATE
        // $this->view->setRenderLevel(
        //     View::LEVEL_AFTER_TEMPLATE
        // );
        // LEVEL TEMPLATE
        // $this->view->setRenderLevel(
        //     View::LEVEL_BEFORE_TEMPLATE
        // );
        
        //TIDAK ADA YANG DIRENDER
        // $this->view->setRenderLevel(
        //     View::LEVEL_NO_RENDER
        // );

        

        //VIEW PICK
        // $this->view->pick('Ikan/index');

        //DISABLE VIEW
        // $this->view->disable();
    
        
    }
    
}