<?php


namespace HTL3R\ESportsBracketManager;

/**
 * @Entity @Table(name="tournament")
 */
class Tournament
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTournamentName()
    {
        return $this->tournamentName;
    }

    /**
     * @param string $tournamentName
     */
    public function setTournamentName($tournamentName)
    {
        $this->tournamentName = $tournamentName;
    }
    /**
     * @OneToMany(targetEntity="Player", mappedBy="tournamentId")
     * @Id @Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $tournamentName;

}