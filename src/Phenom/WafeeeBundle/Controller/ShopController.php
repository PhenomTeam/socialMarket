<?php

namespace Phenom\WafeeeBundle\Controller;

use Phenom\WafeeeBundle\Entity\Category;
use Phenom\WafeeeBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Phenom\WafeeeBundle\Entity\Shop;
use Phenom\WafeeeBundle\Entity\ShopFollow;
use Phenom\WafeeeBundle\Entity\ShopVote;
use Phenom\WafeeeBundle\Entity\ShopVotePoint;
use Phenom\WafeeeBundle\Entity\Notification;
use Phenom\WafeeeBundle\Form\ShopType;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Shop controller.
 *
 * @Route("/shop")
 */
class ShopController extends Controller
{

    /**
     * Lists all Shop entities.
     *
     * @Route("/", name="shop_list")
     * @Method("GET")
     * @Template()
     */
    public function showAllShopAction()
    {
//        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();

        $shops = $em->getRepository('PhenomWafeeeBundle:Shop')->findAll();

        return $this->render('@PhenomWafeee/Shop/index.html.twig',
            array(
            'shops' => $shops,
            )
        );
    }
    /**
     * Creates a new Shop entity.
     *
     * @Route("/", name="shop_create")
     * @Method("POST")
     * @Template("PhenomWafeeeBundle:Shop:new.html.twig")
     */
    public function createShopAction(Request $request)
    {
        $shop = new Shop();
        $form = $this->createForm(new ShopType(), $shop, array(
            'action' => $this->generateUrl('shop_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();

            $shop->setUserId($user);

            $em->persist($shop);
            $em->flush();

            return $this->redirect($this->generateUrl('shop_show', array('id' => $shop->getId())));
        }

        return array(
            'shop' => $shop,
            'form'   => $form->createView(),
        );
    }


    /**
     * Displays a form to create a new Shop entity.
     *
     * @Route("/add_shop", name="add_new_shop")
     * @Method("GET")
     *
     */
    public function addNewShopAction()
    {
        $shop = new Shop();
        $form = $this->createForm(new ShopType(), $shop, array(
            'action' => $this->generateUrl('shop_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $this->render('PhenomWafeeeBundle:Shop:new.html.twig',
            array(
            'shop' => $shop,
            'form'   => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a Shop entity.
     *
     * @Route("/{id}/info", name="shop_show")
     * @Method("GET")
     *
     */
    public function showShopAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->getShopById($id);
        $user = $shop->getUserId();
        $currentUser = null;
        $checkFollow = null;
        $checkOwnerShop = 0;
        if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){// check user signed in
            $currentUser = $this->getUser();
            $checkFollow = $em->getRepository('PhenomWafeeeBundle:ShopFollow')->checkIfShopFollowedByUser($currentUser->getId(), $id);
            $checkOwnerShop = $em->getRepository('PhenomWafeeeBundle:Shop')->checkOwnerShop($currentUser->getId(), $id);
        }
        return $this->render('PhenomWafeeeBundle:Shop:show.html.twig',
            array(
                'shop' => $shop,
                'user'=>$user,
                'currentUser'=>$currentUser,
                'checkFollow'=>$checkFollow,
                'checkOwnerShop'=>$checkOwnerShop
            )
        );
    }


    /**
     * @Route("/followshop", name="followshop")
     */
    public function followShopAction(Request $request)
    {
        if($request->isXmlHttpRequest()) {
            if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
                $id = $request->request->get('id');
                $user = $this->getUser();
                $em = $this->getDoctrine()->getManager();
                $checkFollow = $em->getRepository('PhenomWafeeeBundle:ShopFollow')->checkIfShopFollowedByUser($user->getId(), $id);
                if(!$checkFollow) {
                    $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->getShopById($id);
                    $follow = new ShopFollow();
                    $follow->setUserId($user);
                    $follow->setShopId($shop);
                    $em->persist($follow);
                    $em->flush();

                    $contentNotification = $user->getUsername().' has followed your shop';
                    $notification = new Notification();
                    $notification->setUserId($user);
                    $notification->setShopId($shop);
                    $notification->setContent($contentNotification);

                    $em->persist($notification);
                    $em->flush();
                }
                return new JsonResponse(array('success'=>true));
            }
        }
    }

    /**
     * @Route("/unfollowshop", name="unfollowshop")
     */
    public function unFollowShopAction(Request $request)
    {
        if($request->isXmlHttpRequest()) {
            if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
                $em = $this->getDoctrine()->getManager();
                $idS = $request->request->get('id');
                $user = $this->getUser();
                $shopFollow = $em->getRepository('PhenomWafeeeBundle:ShopFollow')->findOneBy(array('shop_id'=>$idS, 'user_id'=>$user->getId()));
                if($shopFollow != null) {
                    $em->remove($shopFollow);
                    $em->flush();
                }
                return new JsonResponse(array('success'=>true));
            }
        }
    }

    /**
     * @Route("/rateshop", name="rateshop")
     */
    public function rateShopAction(Request $request)
    {
        if($request->isXmlHttpRequest()) {
            if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
                $em = $this->getDoctrine()->getManager();
                $idS = $request->request->get('id');
                $point = $request->request->get('point');
                $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->find($idS);
                $user = $this->getUser();
                $success = false;
                // check user rated this shop or not
                $checkUserRate = $em->getRepository('PhenomWafeeeBundle:ShopVote')->checkUserRateShop($user->getId(), $idS);

                if($checkUserRate == null) {// if user has not rated this shop
                    // check shop has been rated
                    $checkShopRated = $em->getRepository('PhenomWafeeeBundle:ShopVote')->checkShopRated($idS);
                    $shopRated = false;
                    if($checkShopRated) {// if shop has been rated
                        $shopVotePoint = $em->getRepository('PhenomWafeeeBundle:ShopVotePoint')->find($checkShopRated[0]->getShopvoteId()->getId());
                        $numOfVotes = $shopVotePoint->getNumofvotes() + 1;
                        $votePoint = $shopVotePoint->getVotepoint() + $point;
                    } else {// if shop has not been rated
                        $shopVotePoint = new ShopVotePoint();
                        $numOfVotes = 1;
                        $votePoint = $point;
                    }

                    $shopVotePoint->setNumofvotes($numOfVotes);
                    $shopVotePoint->setVotepoint($votePoint);
                    $em->persist($shopVotePoint);
                    $em->flush();

                    $shopVote = new ShopVote();
                    $shopVote->setShopId($shop);
                    $shopVote->setUserId($user);
                    $shopVote->setShopvoteId($shopVotePoint);
                    $em->persist($shopVote);
                    $em->flush();
                    $success = true;
                }
                if($success) {
//                    $numvotes = $shopVotePoint->getNumofvotes();
//                    $votepoint = $shopVotePoint->getVotepoint();
                }
                return new JsonResponse(array('success'=>$success));
            }
        }
    }

    /**
     * Displays a form to edit an existing Shop entity.
     *
     * @Route("/{id}/shop_edit", name="shop_edit")
     * @Method("GET")
     *
     */
    public function editShopAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->find($id);

        $user = $shop->getUserId();

        if (!$shop) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        return $this->render('PhenomWafeeeBundle:Shop:edit.html.twig',
            array(
                'shop'      => $shop,
                'user'      => $user,
            )
        );
    }

    /**
     * Edits an existing Shop entity.
     *
     * @Route("/{id}", name="shop_update")
     * @Method("POST")
     *
     */
    public function updateShopAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->find($id);
        $user = $shop->getUserId();

        if($request->getMethod() == 'POST') {
            $shopname = $request->request->get('shopname');
            $description = $request->request->get('description');
            $shop->setName($shopname);
            $shop->setDescription($description);
            $em->persist($shop);
            $em->flush();

            return $this->redirectToRoute('shop_show', array('id'=>$id));
        }

        return $this->render('PhenomWafeeeBundle:Shop:edit.html.twig',
            array(
                'shop'=>$shop,
                'user'=>$user,
            )
        );
    }
    /**
     * Deletes a Shop entity.
     *
     * @Route("/{id}", name="shop_delete")
     * @Method("DELETE")
     */
    public function deleteShopAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->find($id);

            if (!$shop) {
                throw $this->createNotFoundException('Unable to find Shop entity.');
            }

            $em->remove($shop);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('shop'));
    }

    /**
     * Creates a form to delete a Shop entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('shop_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     *
     * @Route("/{id}/add_category", name="add_category")
     * @Method("GET")
     *
     */
    public function addCategoryAction($id)
    {
        $category = new Category();
        $form = $this->createForm(new CategoryType(), $category, array(
            'action' => $this->generateUrl('add_new_category', array('id' => $id)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $this->render('PhenomWafeeeBundle:Shop:add_category.html.twig',
            array(
                'category' => $category,
                'form'   => $form->createView(),
            )
        );
    }

    /**
     *
     * @Route("/{id}/add_new_category", name="add_new_category")
     * @Method("POST")
     *
     */
    public function addNewCategoryAction(Request $request, $id)
    {
        $category = new Category();

        $form = $this->createForm(new CategoryType(), $category, array(
            'action' => $this->generateUrl('add_new_category', array('id' => $id)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->find($id);

            $category->setShopId($shop);

            $em->persist($category);
            $em->flush();

            return $this->redirect($this->generateUrl('category_show', array('id' => $category->getId())));
        }

        return $this->render('PhenomWafeeeBundle:Shop:add_category.html.twig',
            array(
            'category' => $category,
            'form'   => $form->createView(),
            )
        );
    }

}
