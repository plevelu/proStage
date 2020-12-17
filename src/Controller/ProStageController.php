<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig');
    }
    /**
    * @Route("/entreprises", name="proStage/entreprises")
    */
    public function afficherEntreprises(): Response
    {
        return $this->render('pro_stage/affichageEntreprises.twig');
    }
    public function afficherFormations(): Response
    {
        return $this->render('pro_stage/affichageFormations.twig');
    }
}
