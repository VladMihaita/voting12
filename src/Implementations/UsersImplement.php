<?php
use Doctrine\ORM\QueryBuilder;
// use Entity\Users;

class UsersImplement
{
    private $em;

    public function __construct()
    {
        $this->em = Database::getConnection();
    }
    public function Register ($data) {


        $account = $this->em->getRepository('Users')
            ->findOneBy(array('email' => $data['email']));


        if(!$account) {
            $user = new \Users();
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setRole('user');
            $this->em->persist($user);
            $this->em->flush();
            return true;
        }
        return false;

    }
    public function Login ($email, $password) {
        $user = $this->em->getRepository('Users')
            ->findOneBy(array('email' => $email,
                'password' => $password));
        if($user) {
            return true;
        }
        return false;
    }
    public function listAll() {
        $users = $this->em->getRepository('Users')->findAll();
        $result = array();
        foreach ($users as $user) {
            array_push($result, array('email' => $user->getEmail(),
                                                'id' => $user->getId(),
                                                'role' => $user->getRole()));
        }
        return $result;
    }
    public function userRole($email) {
        if ($email) {
            $user = $this->em->getRepository('Users')->findOneBy(array('email' => $email));
            return $user->getRole();
        }
        return 'user';
    }
    public function userId($email) {
        if ($email) {
            $user = $this->em->getRepository('Users')->findOneBy(array('email' => $email));
            return $user->getId();
        }
        return 'user';
    }
    public function userInfo($id) {
        if (isset($id)) {
            $user = $this->em->getRepository('Users')->findOneBy(array('id' => $id));
            $result = array('email' => $user->getEmail(), 'role' => $user->getRole());
            return $result;
        }
        return 'Error';
    }


}




















