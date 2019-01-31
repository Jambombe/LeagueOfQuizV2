<?php

namespace App\Controller;


use App\Entity\Jeu;
use App\Entity\Question;
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
     */
    public function initGame($gameName, $difficulty)
    {
        $jeuRepo = $this->getDoctrine()->getRepository(Jeu::class);
        $jeu = $jeuRepo->findBy(['name'=>$gameName])[0];

        $questions = $this->getQuestions($jeu, $difficulty);

        return $this->render('play.html.twig', [
                'displayName'=>$jeu->getDisplayName(),
                'difficulty'=>$difficulty,
                'questions'=>$questions,
            ]
        );
    }

    /**
     * Charge 10 question en fonctions du jeu et de la difficulté
     * @param $jeu
     * @param $difficulty
     * @return object[]
     */
    public function getQuestions($jeu, $difficulty)
    {
        $questionRepo = $this->getDoctrine()->getRepository(Question::class);
        $allMatchingQuestions = $questionRepo
            ->findBy([
                'parentGameId'=>$jeu->getId(),
                'difficulty'=>$difficulty,
            ]
            );

        shuffle($allMatchingQuestions);
        $tenQuestions = array_slice($allMatchingQuestions, 0, 2);

        foreach ($tenQuestions as $question)
        {
            $questionRepo->loadAnswers($question);
        }
        return $tenQuestions;
    }

    public function getQuestionsV2($jeu, $difficulty)
    {
        $questionRepo = $this->getDoctrine()->getRepository(Question::class);
        return $questionRepo->tenQuestions($jeu->getId(), $difficulty);

    }

}