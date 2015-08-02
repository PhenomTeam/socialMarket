<?php

namespace Phenom\WafeeeBundle\Controller;

use Phenom\WafeeeBundle\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Phenom\WafeeeBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    /**
     *
     * @Route("/register", name="user_register")
     * @Method("GET")
     */
    public function registerAction()
    {
//        $this->denyAccessUnlessGranted('ROLE_USER');
        $securityContext = $this->get('security.authorization_checker');
        if($securityContext->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('index');
        }
        $user = new User();
        $form = $this->createForm(new RegistrationType(), $user);
        return $this->render(
            '@PhenomWafeee/User/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     *
     * @Route("/register", name="create_user")
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

    /**
     *
     * @Route("/login", name="user_login")
     *
     */
    public function loginAction(Request $request)
    {
        $securityContext = $this->get('security.authorization_checker');
        if($securityContext->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('index');
        }
        $authenticationUtils = $this->get('security.authentication_utils');

        // Get error if any
        $error = $authenticationUtils->getLastAuthenticationError();

        // Last username entered by user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            '@PhenomWafeee/Authenticate/login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error' => $error,
            )
        );
    }


    /**
     *
     * @Route("/login_check", name="login_check")
     *
     */
    public function loginCheckAction()
    {
        // Handle by security systems
    }

    /**
     *
     * @Route("/logout", name="user_logout")
     *
     */
    public function logoutAction()
    {

    }

    /**
     *
     * @Route("/admin", name="admin_page")
     *
     */
    public function adminPageAction()
    {
        return new Response("Admin page");
    }

}
