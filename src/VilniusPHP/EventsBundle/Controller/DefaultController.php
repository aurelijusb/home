<?php

namespace VilniusPHP\EventsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/events")
 */
class DefaultController extends Controller
{
    /**
     * Events list.
     *
     * @Route("/", name="events.list")
     * @Template()
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('VilniusPHPEventsBundle:Event');

        $events = $repository->findBy(array(), array('date' => 'DESC'));

        return array('events' => $events);
    }
}
