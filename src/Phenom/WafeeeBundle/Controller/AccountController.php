<?php

namespace Phenom\WafeeeBundle\Controller;

use Phenom\WafeeeBundle\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Phenom\WafeeeBundle\Entity\User;

class AccountController extends Controller
{
    /**
     *
     * @Route("/register", name="user_register")
     * @Method("GET")
     */
    public function registerAction()
    {
        $user = new User();
        $form = $this->createForm(new RegistrationType(), $user);
        return $this->render(
            '@PhenomWafeee/User/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     *
     * @Route("/register", name="account_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = new User();

        $form = $this->createForm(new RegistrationType(), $user);

        $form->handleRequest($request);

        if($form->isValid())
        {
            $user = $form->getData();

            $user->setRole('ROLE_USER');
            $user->setIsActive(false);
            $user->setIsOnline(true);

            $pwd = $user->getPassword();
            $encoder = $this->container->get('security.password_encoder');
            $pwd = $encoder->encodePassword($user, $pwd);
            $user->setPassword($pwd);

            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('index'));
        }

        return $this->render(
            '@PhenomWafeee/User/register.html.twig',
            array('form' => $form->createView())
        );
    }

}
