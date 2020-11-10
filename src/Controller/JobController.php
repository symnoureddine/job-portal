<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

 /**
     * @Route("/job")
     */
class JobController extends AbstractController
{
    /**
     * @Route("/", name="job")
     */
    public function index(): Response
    {
        return $this->render('job/list.html.twig');
    }
}
