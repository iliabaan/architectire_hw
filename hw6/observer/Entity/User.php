<?php


namespace Entity;


use SplSubject;

class User
{
    private $name;
    private $email;
    private $experience;

    /**
     * User constructor.
     * @param $name
     * @param $email
     * @param $experience
     */
    public function __construct($name, $email, $experience)
    {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }
}