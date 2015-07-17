<?php

namespace Phenom\WafeeeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/{name}", name="index")
     *
     */
    public function indexAction($name)
    {
        return $this->render('PhenomWafeeeBundle:Default:index.html.twig', array('name' => $name));
    }
}
