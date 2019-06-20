<?php

use Doctrine\ORM\QueryBuilder;


class VotesImplement
{
    private $em;

    public function __construct()
    {
        $this->em = Database::getConnection();
    }

    public function Create ($data) {
        $vote = new \Votes();

        $vote->setUserid($data['userId']);
        $vote->setAnswerid($data['answerId']);
        $vote->setPollid($data['pollid']);

        $this->em->persist($vote);
        $this->em->flush();
    }

    public function ListVotesByUser ($userid) {
        $votes = $this->em->getRepository('Votes')->findBy(array('userid' => $userid));

        $result = array();
        foreach ($votes as $vote) {
            array_push($result, array('answerId' => $vote->getAnswerid()));
        }
        return $result;
    }

    public function GetPollVotes ($pollid, $userid) {
        $votes = $this->em->getRepository('Votes')->findBy(array('pollid' => $pollid,
                                                                    'userid' => $userid));
        $result = array();
        foreach ($votes as $vote) {
            array_push($result, array('id' => $vote->getId(),
                                                'answerid' => $vote->getAnswerid()));
        }
        return $result;
    }
    public function IdByAnswer($ansid) {
        $votes = $this->em->getRepository('Votes')->findBy(array('answerid' => $ansid));

        $result = array();
        foreach ($votes as $vote) {
            array_push($result, array('id' => $vote->getId()));
        }
        return $result;
    }

    public function Delete ($id) {
        $vote = $this->em->getRepository('Votes')->findOneBy(array('id' => $id));

        $this->em->remove($vote);
        $this->em->flush();
    }

}