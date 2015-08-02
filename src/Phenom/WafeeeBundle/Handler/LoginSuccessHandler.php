<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 7/28/15
 * Time: 9:55 AM
 */

namespace Phenom\WafeeeBundle\Handler;


use SensioLabs\Security\SecurityChecker;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{

    protected $router;
    protected $security;

    public function __construct(Router $router, SecurityChecker $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if($this->security->isGranted('ROLE_SUPER_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('admin_page'));
        }
        elseif ($this->security->isGranted('ROLE_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('admin_page'));
        }
        elseif ($this->security->isGranted('ROLE_USER'))
        {
            $response = new RedirectResponse($this->router->generate('user'));
        }

        return $response;
    }
}