<?php

use Doctrine\ORM\QueryBuilder;


class PollsImplement
{
    private $em;

    public function __construct()
    {
        $this->em = Database::getConnection();
    }
    public function Create ($data) {
        $poll = new \Polls();
        $poll->setName($data['name']);
        $poll->setQuestion($data['question']);

        $this->em->persist($poll);
        $this->em->flush();
    }

    public function Update ($data) {
        if (isset($data['id'])) {
            $poll = $this->em->getRepository('Polls')->findOneBy(array('id' => $data['id']));
            $poll->setName($data['name']);
            $poll->setQuestion($data['question']);

            $this->em->persist($poll);
            $this->em->flush();
        }
    }

    public function Delete ($id) {
        $poll = $this->em->getRepository('Polls')->findOneBy(array('id' => $id));

        $this->em->remove($poll);
        $this->em->flush();
    }

    public function listAll() {
        $polls = $this->em->getRepository('Polls')->findAll();
        $result = array();
        foreach ($polls as $poll) {
            array_push($result, array('id' => $poll->getId(),
                                                'name' => $poll->getName(),
                                                'question' => $poll->getQuestion()));
        }
        return $result;
    }

    public function pollInfo($id) {
        if (isset($id)) {
            $poll = $this->em->getRepository('Polls')->findOneBy(array('id' => $id));
            $result = array('name' => $poll->getName(), 'question' => $poll->getQuestion());
            return $result;
        }
        return 'Error';
    }

}