<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
	/**
	 * @Route("/blog/", name="blog_main")
     */
    public function mainAction()
    {
     	return new Response(
     		'<html><body>hello, this is my </body></html>'
     	);
    }

    /**
	 * @Route("/blog/{page}", name="blog_list", requirements={"page": "\d+"})
     */
    public function listAction($page)
    {
    	$entry = $this->getDoctrine()
    		->getRepository('AppBundle:Entry')
    		->find($page);

    	if (!$entry) {
    		throw $this->createNotFoundException(
    			'No entry found for page'.$page
    		);
    	}
     	return new Response(
     		'<html><body>hello, this is my entry named '.$entry->getHeading().'<br>'.$entry->getDescription().'</body></html>'
     	);   // ...
    }

    /**
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function showAction($kek)
    {
        $url = $this->generateUrl(
            'blog_show',
            array('slug' => 'my-blog-post')
        );

        return new Response(
     		'<html><body>'.$url.'</body></html>'
     	);
    }
}