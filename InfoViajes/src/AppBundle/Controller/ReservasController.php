<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reservas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reserva controller.
 *
 * @Route("reservas")
 */
class ReservasController extends Controller
{
    /**
     * Lists all reserva entities.
     *
     * @Route("/", name="reservas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservas = $em->getRepository('AppBundle:Reservas')->findAll();

        return $this->render('reservas/index.html.twig', array(
            'reservas' => $reservas,
        ));
    }

    /**
     * Creates a new reserva entity.
     *
     * @Route("/new", name="reservas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reserva = new Reservas();
        $form = $this->createForm('AppBundle\Form\ReservasType', $reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reserva);
            $em->flush();

            return $this->redirectToRoute('reservas_show', array('id' => $reserva->getId()));
        }

        return $this->render('reservas/new.html.twig', array(
            'reserva' => $reserva,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reserva entity.
     *
     * @Route("/{id}", name="reservas_show")
     * @Method("GET")
     */
    public function showAction(Reservas $reserva)
    {
        $deleteForm = $this->createDeleteForm($reserva);

        return $this->render('reservas/show.html.twig', array(
            'reserva' => $reserva,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reserva entity.
     *
     * @Route("/{id}/edit", name="reservas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reservas $reserva)
    {
        $deleteForm = $this->createDeleteForm($reserva);
        $editForm = $this->createForm('AppBundle\Form\ReservasType', $reserva);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservas_edit', array('id' => $reserva->getId()));
        }

        return $this->render('reservas/edit.html.twig', array(
            'reserva' => $reserva,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reserva entity.
     *
     * @Route("/{id}", name="reservas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reservas $reserva)
    {
        $form = $this->createDeleteForm($reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reserva);
            $em->flush();
        }

        return $this->redirectToRoute('reservas_index');
    }

    /**
     * Creates a form to delete a reserva entity.
     *
     * @param Reservas $reserva The reserva entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservas $reserva)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservas_delete', array('id' => $reserva->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
