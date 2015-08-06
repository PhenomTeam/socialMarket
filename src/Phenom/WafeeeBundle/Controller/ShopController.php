<?php

namespace Phenom\WafeeeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Phenom\WafeeeBundle\Entity\Shop;
use Phenom\WafeeeBundle\Form\ShopType;

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
    public function showAllAction()
    {
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
    public function createAction(Request $request)
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
     * @Route("/new", name="shop_new")
     * @Method("GET")
     *
     */
    public function newAction()
    {
        $shop = new Shop();
        $form = $this->createForm(new ShopType(), $shop, array(
            'action' => $this->generateUrl('shop_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $this->render('PhenomWafeeeBundle:Shop:new.html.twig',
            array(
            'entity' => $shop,
            'form'   => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a Shop entity.
     *
     * @Route("/{id}", name="shop_show")
     * @Method("GET")
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->find($id);

        if (!$shop) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PhenomWafeeeBundle:Shop:show.html.twig',
            array(
            'shop'      => $shop,
            'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing Shop entity.
     *
     * @Route("/{id}/edit", name="shop_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->find($id);

        if (!$shop) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $editForm = $this->createForm(new ShopType(), $shop, array(
            'action' => $this->generateUrl('shop_update', array('id' => $shop->getId())),
            'method' => 'PUT',
        ));

        $editForm->add('submit', 'submit', array('label' => 'Update'));

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'shop'      => $shop,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Shop entity.
     *
     * @Route("/{id}", name="shop_update")
     * @Method("PUT")
     * @Template("PhenomWafeeeBundle:Shop:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $shop = $em->getRepository('PhenomWafeeeBundle:Shop')->find($id);

        if (!$shop) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $editForm = $this->createForm(new ShopType(), $shop, array(
            'action' => $this->generateUrl('shop_update', array('id' => $shop->getId())),
            'method' => 'PUT',
        ));

        $editForm->add('submit', 'submit', array('label' => 'Update'));

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('shop_edit', array('id' => $id)));
        }

        return array(
            'shop'      => $shop,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Shop entity.
     *
     * @Route("/{id}", name="shop_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
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
}
