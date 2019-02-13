<?php

namespace App\Controller;


use App\Constants;
use App\Entity\Jeu;
use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\JeuRepository;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PlayController
 * @package App\Controller
 * @Route("/jouer")
 */
class PlayController extends Controller
{

    /**
     * @Route("/{gameName}/{difficulty}")
     * @param $gameName
     * @param $difficulty
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function initGame($gameName, $difficulty)
    {
        /** @var JeuRepository $jeuRepo */
        $jeuRepo = $this->getDoctrine()->getRepository(Jeu::class);

        /** @var Jeu $jeu */
        $jeu = $jeuRepo->findByName($gameName)[0];

        $questions = $this->getQuestions($jeu, $difficulty, Constants::NB_QUESTIONS);

        return $this->render('play/play.html.twig', [
                'displayName'=>$jeu->getDisplayName(),
                'difficulty'=>$difficulty,
                'questions'=>$questions,
            ]
        );
    }

    /**
     * Charge $nbQuestions questions en fonction du jeu et de la difficulté
     * @param $jeu Jeu
     * @param $difficulty string
     * @param $nbQuestions integer
     * @return object[]
     */
    public function getQuestions($jeu, $difficulty, $nbQuestions)
    {
        /**@var QuestionRepository $questionRepo **/
        $questionRepo = $this->getDoctrine()->getRepository(Question::class);

        // Tout les ids des questions correspondantes au $jeu et à la $difficulty
        $matchingIds = $questionRepo->getMatchingIds($jeu, $difficulty);

        // On prend aléatoirement Constants:NB_QUESTIONS ids
        shuffle($matchingIds);
        $questionIds = array_slice($matchingIds, 0, $nbQuestions);

        // On charge les questions correspondantes aux ids sélectionnés
        $questions = [];
        foreach ($questionIds as $questionId)
        {
            array_push($questions,$questionRepo->find($questionId));
        }

        shuffle($questions);

        return $questions;
    }

}