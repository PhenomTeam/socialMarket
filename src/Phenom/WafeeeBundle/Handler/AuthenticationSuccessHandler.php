<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 7/28/15
 * Time: 10:58 AM
 */

namespace Phenom\WafeeeBundle\Handler;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler;
use Symfony\Component\Security\Http\HttpUtils;

class AuthenticationSuccessHandler extends DefaultAuthenticationSuccessHandler
{

    protected $container;

    public function __construct(HttpUtils $httpUtils, ContainerInterface $containerInterface, array $options)
    {
        parent::__construct($httpUtils, $options);
        $this->container = $containerInterface;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $user = $token->getUser();

        $em = $this->container->get('doctrine.orm.entity_manager');

        $em->persist($user);
        $em->flush();

        return $this->httpUtils->createRedirectResponse($request, 'user_register');
    }
}