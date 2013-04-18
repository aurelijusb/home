<?php

namespace VilniusPHP\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/books", name="library.list")
     * @Template()
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('VilniusPHPLibraryBundle:Book');

        $books = $repository->findBy(array(), array('id' => 'DESC'));

        return array('books' => $books);
    }

    /**
     * @Route("/book/{id}", name="library.book")
     * @Template()
     */
    public function bookAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('VilniusPHPLibraryBundle:Book');

        $book = $repository->findOneBy(array('id' => $id));

        return array('book' => $book);
    }
}
