<?php

namespace Phenom\WafeeeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class StaticPageController extends Controller
{
    /**
     * @Route("/", name="index")
     *
     */
    public function indexAction()
    {
        return $this->render('PhenomWafeeeBundle:StaticPage:index.html.twig');
    }

    /**
     * @Route("/about", name="about_page")
     *
     */
    public function aboutAction()
    {
        return $this->render('PhenomWafeeeBundle:StaticPage:about_us.html.twig');
    }
}
