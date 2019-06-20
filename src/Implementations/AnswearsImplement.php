<?php

use Doctrine\ORM\QueryBuilder;


class AnswearsImplement
{
    private $em;

    public function __construct()
    {
        $this->em = Database::getConnection();
    }

    public function Create ($data) {
        $answear = new \Answears();
        $answear->setPollid($data['pollid']);
        $answear->setAnswer($data['answear']);
        $answear->setVotes(0);

        $this->em->persist($answear);
        $this->em->flush();
    }

    public function Delete ($id) {

        if (isset($id)) {
            $answer = $this->em->getRepository('Answears')->findOneBy(array('id' => $id));

            $this->em->remove($answer);
            $this->em->flush();
        }
    }

    public function AddVote ($id) {

        if (isset($id)) {
            $answer = $this->em->getRepository('Answears')->findOneBy(array('id' => $id));

            $votesNr = $answer->getVotes();
            $votesNr++;
            $answer->setVotes($votesNr);

            $this->em->persist($answer);
            $this->em->flush();
        }
    }

    public function RemoveVote ($id) {
        if (isset($id)) {
            $answer = $this->em->getRepository('Answears')->findOneBy(array('id' => $id));

            $votesNr = $answer->getVotes();
            $votesNr--;
            $answer->setVotes($votesNr);

            $this->em->persist($answer);
            $this->em->flush();
        }
    }



    public function getPollId ($id) {
        if (isset($id)) {
            $answer = $this->em->getRepository('Answears')->findOneBy(array('id' => $id));
            $pollId = $answer->getPollId();

            return $pollId;

        }
    }

    public function ListAll($pollid)
    {
        $answears = $this->em->getRepository('Answears')->findBy(array('pollid' => $pollid));
        $result = array();
        foreach ($answears as $answear) {
            array_push($result, array('id' => $answear->getId(),
                                                'answear' => $answear->getAnswer(),
                                                'votes' => $answear->getVotes()));
        }
        return $result;
    }
}