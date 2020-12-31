<?php

namespace App\Controller;
use App\Repository\StageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage_accueil")
    */
    public function index(StageRepository $stageRepository): Response
    {

      //$annonces = StageRepository->findAll5();
      // Render twig
    return $this->render('pro_stage/index.html.twig'/*,[
      'annonces' : $annonces
    ]*/);
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
