<?php
/**
 * Created by PhpStorm.
 * User: agrue
 * Date: 04.03.2019
 * Time: 10:32
 */

namespace HTL3R\ESportsBracketManager;

/**
 * @Entity @Table(name="players")
 */
class Player implements \JsonSerializable {
    /**
     * @return int
     */
    public function getTournamentId()
    {
        return $this->tournamentId;
    }

    /**
     * @param int $tournamentId
     */
    public function setTournamentId($tournamentId)
    {
        $this->tournamentId = $tournamentId;
    }

    /**
     * @Id @Column(type="integer")
     */
    protected $id;
    /**
     * @Column(type="string")
     */
    protected $firstname;
    /**
     * @Column(type="string")
     */
    protected $lastname;
    /**
     * @Column(type="string")
     */
    protected $username;
    /**
     * @Column(type="string")
     */
    protected $email;

    /**
     * @ManyToOne(targetEntity="Tournament", inversedBy="id")
     * @Id
     * @Column(type="integer")
     * @var int
     */
    protected $tournamentId;

    public function __construct()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->username = '';
        $this->email = '';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }



    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setId($id){
        $this->id = $id;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $jsonArray[0] = $this->firstname;
        $jsonArray[1] = $this->lastname;
        $jsonArray[2] = $this->email;
        $jsonArray[3] = $this->username;
        return $jsonArray;
    }
}