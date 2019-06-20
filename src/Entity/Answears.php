<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Answears
 *
 * @ORM\Table(name="answears")
 * @ORM\Entity
 */
class Answears
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
     * @var string
     *
     * @ORM\Column(name="answer", type="string", length=255, nullable=false)
     */
    private $answer;

    /**
     * @var int
     *
     * @ORM\Column(name="votes", type="integer", nullable=false)
     */
    private $votes;



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
     * @return Answears
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
     * Set answer.
     *
     * @param string $answer
     *
     * @return Answears
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer.
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set votes.
     *
     * @param int $votes
     *
     * @return Answears
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Get votes.
     *
     * @return int
     */
    public function getVotes()
    {
        return $this->votes;
    }
}
