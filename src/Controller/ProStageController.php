<?php

namespace App\Controller;
use App\Repository\StageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage_accueil")
    */
    public function index(): Response
    {
      $repositoryStage = $this-> getDoctrine()->getRepository(Stage::class);
      $stages = $repositoryStage->findAll();
    return $this->render('pro_stage/index.html.twig',['stages'=>$stages]);
    }

    /**
     * @Route("/entreprises", name="proStage_entreprises")
    */
    public function afficherEntreprises(): Response
    {
        $repositoryEntreprise = $this-> getDoctrine()->getRepository(Entreprise::class);
        $entreprises = $repositoryEntreprise->findAll();
        return $this->render('pro_stage/affichageEntreprises.html.twig',['entreprises'=>$entreprises]);
    }

    /**
     * @Route("/formations", name="proStage_formations")
    */
    public function afficherFormations(): Response
    {
        $repositoryFormation = $this-> getDoctrine()->getRepository(Formation::class);
        $formations = $repositoryFormation->findAll();
        return $this->render('pro_stage/affichageFormations.html.twig',['formations'=>$formations]);
    }

    /**
     * @Route("/stageETP/{entreprise}", name="proStage_stagesEntreprise")
    */
    public function afficherStagesETP($entreprise): Response
    {
        $repositoryStage = $this-> getDoctrine()->getRepository(Stage::class);
        $stages = $repositoryStage->findByEntreprise($entreprise);
        return $this->render('pro_stage/stageETP.html.twig',['stages'=>$stages]);
    }

    /**
     * @Route("/stageFMT/{formation}", name="proStage_stagesFormations")
    */
    public function afficherStagesFMT($formation): Response
    {
        $repositoryFormation = $this-> getDoctrine()->getRepository(Formation::class);
        $uneFormation = $repositoryFormation->find($formation);
        return $this->render('pro_stage/stageFMT.html.twig',['formation'=>$uneFormation]);
    }

    /**
     * @Route("/stage/{id}", name="proStage_stages")
    */
    public function afficherStage($id): Response
    {
        $repositoryStage = $this-> getDoctrine()->getRepository(Stage::class);
        $stage = $repositoryStage->find($id);
        return $this->render('pro_stage/stage.html.twig',['stage'=>$stage]);
    }
}
