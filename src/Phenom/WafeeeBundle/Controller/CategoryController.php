<?php

namespace Phenom\WafeeeBundle\Controller;

use Phenom\WafeeeBundle\Entity\Shop;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Phenom\WafeeeBundle\Entity\Category;
use Phenom\WafeeeBundle\Entity\Product;
use Phenom\WafeeeBundle\Form\ProductType;
use Phenom\WafeeeBundle\Form\CategoryType;

/**
 * Category controller.
 *
 * @Route("/category")
 */
class CategoryController extends Controller
{

    /**
     * Lists all Category entities.
     *
     * @Route("/", name="category_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('PhenomWafeeeBundle:Category')->findAll();

        return array(
            'categories' => $categories,
        );
    }
    /**
     * Creates a new Category entity.
     *
     * @Route("/", name="category_create")
     * @Method("POST")
     * @Template("PhenomWafeeeBundle:Category:new.html.twig")
     */
    public function createAction(Request $request, Shop $shopId)
    {
        $category = new Category();

        $form = $this->createForm(new CategoryType(), $category, array(
            'action' => $this->generateUrl('category_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $category->setShopId($shopId);

            $em->persist($category);
            $em->flush();

            return $this->redirect($this->generateUrl('category_show', array('id' => $category->getId())));
        }

        return array(
            'category' => $category,
            'form'   => $form->createView(),
        );
    }


    /**
     * Displays a form to create a new Category entity.
     *
     * @Route("/new", name="category_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $category = new Category();

        $form = $this->createForm(new CategoryType(), $category, array(
            'action' => $this->generateUrl('category_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return array(
            'category' => $category,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Category entity.
     *
     * @Route("/{id}", name="category_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('PhenomWafeeeBundle:Category')->find($id);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'category'      => $category,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Category entity.
     *
     * @Route("/{id}/edit", name="category_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('PhenomWafeeeBundle:Category')->find($id);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }


        $editForm = $this->createForm(new CategoryType(), $category, array(
            'action' => $this->generateUrl('category_update', array('id' => $category->getId())),
            'method' => 'PUT',
        ));

        $editForm->add('submit', 'submit', array('label' => 'Update'));

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'category'      => $category,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }


    /**
     * Edits an existing Category entity.
     *
     * @Route("/{id}", name="category_update")
     * @Method("PUT")
     * @Template("PhenomWafeeeBundle:Category:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('PhenomWafeeeBundle:Category')->find($id);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $editForm = $this->createForm(new CategoryType(), $category, array(
            'action' => $this->generateUrl('category_update', array('id' => $category->getId())),
            'method' => 'PUT',
        ));

        $editForm->add('submit', 'submit', array('label' => 'Update'));

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('category_edit', array('id' => $id)));
        }

        return array(
            'category'      => $category,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Category entity.
     *
     * @Route("/{id}", name="category_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $category = $em->getRepository('PhenomWafeeeBundle:Category')->find($id);

            if (!$category) {
                throw $this->createNotFoundException('Unable to find Category entity.');
            }

            $em->remove($category);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('category'));
    }

    /**
     * Creates a form to delete a Category entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('category_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Displays a form to create a new Product entity.
     *
     * @Route("/{id}/add_product", name="add_product")
     * @Method("GET")
     *
     */
    public function addProductAction($id)
    {
        $product = new Product();

        $form = $this->createForm(new ProductType(), $product, array(
            'action' => $this->generateUrl('add_new_product', array('id' => $id)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $this->render('PhenomWafeeeBundle:Category:add_product.html.twig',
            array(
                'product' => $product,
                'form'   => $form->createView(),
            )
        );
    }

    /**
     * Creates a new Product entity.
     *
     * @Route("/{id}/add_new_product", name="add_new_product")
     * @Method("POST")
     *
     */
    public function addNewProductAction(Request $request, $id)
    {
        $product = new Product();

        $form = $this->createForm(new ProductType(), $product, array(
            'action' => $this->generateUrl('add_new_product', array('id' => $id)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $product = $form->getData();

            $category = $em->getRepository('PhenomWafeeeBundle:Category')->find($id);

            $category->addProduct($product);

            $em->persist($product);
            $em->flush();

            return $this->redirect($this->generateUrl('product_show', array('id' => $product->getId())));
        }

        return $this->render('PhenomWafeeeBundle:Category:add_product.html.twig',
            array(
                'product' => $product,
                'form'   => $form->createView(),
            )
        );
    }

    /**
     *
     * @Route("/cate/catee", name="category_page")
     *
     */
    public function categoryPageAction()
    {
        return $this->render('PhenomWafeeeBundle:Category:category.page.html.twig');
    }

}
