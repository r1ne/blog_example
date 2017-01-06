<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller {
	/**
	 * @Route("/index")
	 */
	public function indexAction() {
		throw $this->createNotFoundException('The product does not exist');

		return $this->render('kek');
	}
}