<?php

namespace VilniusPHP\LibraryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VilniusPHP\LibraryBundle\Entity\Book;

/**
 * Comment controller.
 */
class CommentController extends Controller
{

    /**
     * List all comments of Book.
     * 
     * @Method("GET")
     * @Template()
     */
    public function listAction($bookId)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VilniusPHPLibraryBundle:Comment')
            ->findBy(
                array('book' => $bookId, 'review' => 0),
                array('date' => 'DESC')
            );

        return array(
            'entities' => $entities
        );
    }

    /**
     * List all reviews of Book.
     * 
     * @Method("GET")
     * @Template()
     */
    public function reviewsAction($bookId)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VilniusPHPLibraryBundle:Comment')
            ->findBy(
                array('book' => $bookId, 'review' => 1),
                array('date' => 'DESC')
            );

        return array(
            'entities' => $entities
        );
    }
}
