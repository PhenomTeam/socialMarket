<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 8/3/15
 * Time: 10:36 AM
 */

namespace Phenom\WafeeeBundle\Auth;


use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUserProvider;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Phenom\WafeeeBundle\Entity\User;

class OAuthProvider extends OAuthUserProvider {
    protected $session, $doctrine, $container;

    public function __construct($session, $doctrine, $service_container)
    {
        $this->session = $session;
        $this->doctrine = $doctrine;
        $this->container = $service_container;
    }

    public function loadUserByUsername($username)
    {
        $qb = $this->doctrine->getManager()->createQueryBuilder();
        $qb->select('u')
            ->from('PhenomWafeeeBundle:User', 'u')
            ->where('u.facebookId = :fbId')
            ->setParameter('fbId', $username)
            ->setMaxResults(1);
        $result = $qb->getQuery()->getResult();

        if (count($result)) {
            return $result[0];
        } else {
            return new User();
        }
    }

    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        // Data from facebook
        $token = $response->getAccessToken();
        $facebookId = $response->getUsername();
        $firstName = $response->getFirstName();
        $lastName = $response->getLastName();
        $email = $response->getEmail();
        $avatarName = $response->getProfilePicture();

        // Set data in session
        $this->session->set('email', $email);
        $this->session->set('firstName', $firstName);
        $this->session->set('lastName', $lastName);
        $this->session->set('avatarName', $avatarName);

        // Check if the fb user already exist in your DB
        $qb = $this->doctrine->getManager()->createQueryBuilder();
        $qb->select('u')
            ->from('PhenomWafeeeBundle:User', 'u')
            ->where('u.facebookId = :fbId')
            ->setParameter('fbId', $facebookId)
            ->setMaxResults(1);
        $result = $qb->getQuery()->getResult();

        // Add to DB if doesnt exists
        if(!count($result))
        {
            $user = new User();
            $user->setUsername($facebookId);
            $user->setFirstname($firstName);
            $user->setLastname($lastName);
            $user->setEmail($email);
            $user->setFacebookId($facebookId);
            $user->setIsActive(false);
            $user->setIsOnline(true);
            $user->setRole('ROLE_USER');

            //Set some wild random pass since its irrelevant, this is Facebook login
            $factory = $this->container->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword(md5(uniqid()), $user->getSalt());
            $user->setPassword($password);

            $em = $this->doctrine->getManager();
            $em->persist($user);
            $em->flush();
        } else {
            $user = $result[0];
        }

        $this->session->set('id', $user->getId());

        return $this->loadUserByUsername($response->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'Phenom\\WafeeeBundle\\Entity\\User';
    }

}