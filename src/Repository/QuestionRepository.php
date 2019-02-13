<?php

namespace App\Repository;

use App\Entity\Jeu;
use App\Entity\Question;
use App\Entity\Reponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Question|null find($id, $lockMode = null, $lockVersion = null)
 * @method Question|null findOneBy(array $criteria, array $orderBy = null)
 * @method Question[]    findAll()
 * @method Question[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Question::class);
    }

    public function getQuestionAndAnswers($id)
    {
        $question = $this->find($id);
        $reponseRepo = $this->getEntityManager()->getRepository(Reponse::class);
        $reponses = $reponseRepo->findBy([
            'parent_question_id' => $id,
        ]);

        $question->setReponses($reponses);

        return $question;
    }

    /**
     * @param $jeu Jeu
     * @param $difficulty string
     * @param $nb integer
     * @return array
     */
    public function getMatchingIds($jeu, $difficulty)
    {
        $ids = $this
            ->getEntityManager()->createQuery("SELECT DISTINCT q.id FROM App:Question q WHERE q.parentGameId = :parentGameId AND q.difficulty = :difficulty")
            ->setParameters(['parentGameId'=>$jeu->getId(), 'difficulty'=>$difficulty])
            ->getResult()
        ;
        $matchingIds = [];
        foreach ($ids as $id){
            array_push($matchingIds, $id['id']);
        }

        return $matchingIds;
    }

    // /**
    //  * @return Question[] Returns an array of Question objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Question
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
