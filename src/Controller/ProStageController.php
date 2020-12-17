<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage_accueil")
    */
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig');
    }

    /**
     * @Route("/entreprises", name="proStage_entreprises")
    */
    public function afficherEntreprises(): Response
    {
        return $this->render('pro_stage/affichageEntreprises.html.twig');
    }

    /**
     * @Route("/formations", name="proStage_formations")
    */
    public function afficherFormations(): Response
    {
        return $this->render('pro_stage/affichageFormations.html.twig');
    }

    /**
     * @Route("/stage/{id}", name="proStage_stages")
    */
    public function afficherStage($id): Response
    {
        return $this->render('pro_stage/stage.html.twig',['id_Stage'=>$id]);
    }
}
