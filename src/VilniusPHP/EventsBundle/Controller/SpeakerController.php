<?php

namespace VilniusPHP\EventsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VilniusPHP\EventsBundle\Entity\Speaker;
use VilniusPHP\EventsBundle\Form\SpeakerType;

/**
 * Speaker controller.
 *
 * @Route("/speaker")
 */
class SpeakerController extends Controller
{
    /**
     * Lists all Speaker entities.
     *
     * @Route("/", name="speaker")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VilniusPHPEventsBundle:Speaker')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Speaker entity.
     *
     * @Route("/", name="speaker_create")
     * @Method("POST")
     * @Template("VilniusPHPEventsBundle:Speaker:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Speaker();
        $form = $this->createForm(new SpeakerType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('speaker_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Speaker entity.
     *
     * @Route("/new", name="speaker_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Speaker();
        $form   = $this->createForm(new SpeakerType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Speaker entity.
     *
     * @Route("/{id}", name="speaker_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VilniusPHPEventsBundle:Speaker')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Speaker entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Speaker entity.
     *
     * @Route("/{id}/edit", name="speaker_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VilniusPHPEventsBundle:Speaker')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Speaker entity.');
        }

        $editForm = $this->createForm(new SpeakerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Speaker entity.
     *
     * @Route("/{id}", name="speaker_update")
     * @Method("PUT")
     * @Template("VilniusPHPEventsBundle:Speaker:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VilniusPHPEventsBundle:Speaker')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Speaker entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SpeakerType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('speaker_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Speaker entity.
     *
     * @Route("/{id}", name="speaker_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VilniusPHPEventsBundle:Speaker')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Speaker entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('speaker'));
    }

    /**
     * Creates a form to delete a Speaker entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
