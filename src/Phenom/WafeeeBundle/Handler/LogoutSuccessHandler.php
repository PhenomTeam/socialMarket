<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 7/28/15
 * Time: 10:33 AM
 */

namespace Phenom\WafeeeBundle\Handler;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class LogoutSuccessHandler implements LogoutSuccessHandlerInterface
{

    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function onLogoutSuccess(Request $request)
    {
        $response = new RedirectResponse($this->router->generate('index'));
    }
}