<?php

namespace Phenom\WafeeeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Phenom\WafeeeBundle\Entity\User;
use Phenom\WafeeeBundle\Form\UserType;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{

    /**
     * Lists all User entities.
     *
     * @Route("/", name="user")
     * @Method("GET")
     *
     */
    public function showAllAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PhenomWafeeeBundle:User')->findAll();

        return $this->render('PhenomWafeeeBundle:User:index.html.twig',
            array(
            'entities' => $entities,
            )
        );
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{username}", name="user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($username)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PhenomWafeeeBundle:User')->findOneBy(array('username' => $username));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($username);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{username}/edit", name="user_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($username)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PhenomWafeeeBundle:User')->findOneBy(array('username' => $username));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($username);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('username' => $entity->getUsername())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing User entity.
     *
     * @Route("/{username}", name="user_update")
     * @Method("PUT")
     * @Template("PhenomWafeeeBundle:User:edit.html.twig")
     */
    public function updateAction(Request $request, $username)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PhenomWafeeeBundle:User')->findOneBy(array('username' => $username));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($username);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('user_edit', array('username' => $username)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a User entity.
     *
     * @Route("/{username}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $username)
    {
        $form = $this->createDeleteForm($username);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PhenomWafeeeBundle:User')->findOneBy(array('username' => $username));

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a User entity by username.
     *
     * @param mixed $username The entity username
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($username)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('username' => $username)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
