<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Votes
 *
 * @ORM\Table(name="votes")
 * @ORM\Entity
 */
class Votes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="pollid", type="integer", nullable=false)
     */
    private $pollid;

    /**
     * @var int
     *
     * @ORM\Column(name="answerid", type="integer", nullable=false)
     */
    private $answerid;

    /**
     * @var int
     *
     * @ORM\Column(name="userid", type="integer", nullable=false)
     */
    private $userid;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pollid.
     *
     * @param int $pollid
     *
     * @return Votes
     */
    public function setPollid($pollid)
    {
        $this->pollid = $pollid;

        return $this;
    }

    /**
     * Get pollid.
     *
     * @return int
     */
    public function getPollid()
    {
        return $this->pollid;
    }

    /**
     * Set answerid.
     *
     * @param int $answerid
     *
     * @return Votes
     */
    public function setAnswerid($answerid)
    {
        $this->answerid = $answerid;

        return $this;
    }

    /**
     * Get answerid.
     *
     * @return int
     */
    public function getAnswerid()
    {
        return $this->answerid;
    }

    /**
     * Set userid.
     *
     * @param int $userid
     *
     * @return Votes
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid.
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }
}
