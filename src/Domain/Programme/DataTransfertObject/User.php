<?php


namespace App\Domain\Programme\DataTransfertObject;

use App\Application\Validator\UniquePseudo;
use App\Application\Validator\UniqueEmail;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class User
 * @package App\Domain\Programme\DataTransfertObject
 */
class User
{
    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Length(min=4)
     */
    private ?string $lastName = null;

    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Length(min=4)
     */
    private ?string $firstName = null;

    /**
     * @var string|null
     */
    private ?string $type_compte = null;

    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Length(min=4)
     */
    private ?string $password= null;

    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Length(min=4)
     * @UniquePseudo
     */
    private ?string $pseudo = null;

    /**
     * @var string|null
     */
    private ?string $secretQuestion = null;

    /**
     * @var string|null
     * @Assert\NotBlank
     */
    private ?string $secretQuestionAnswer = null;


    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getTypeCompte(): ?string
    {
        return $this->type_compte;
    }

    /**
     * @param string $type_compte
     */
    public function setTypeCompte(?string $type_compte = null): void
    {
        if($type_compte === null){
            $this->type_compte = "user";
        }
        $this->type_compte = $type_compte;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getSecretQuestion(): ?string
    {
        return $this->secretQuestion;
    }

    /**
     * @param string $secretQuestion
     */
    public function setSecretQuestion(?string $secretQuestion): void
    {
        $this->secretQuestion = $secretQuestion;
    }

    /**
     * @return string|null
     */
    public function getSecretQuestionAnswer(): ?string
    {
        return $this->secretQuestionAnswer;
    }

    /**
     * @param string $secretQuestionAnswer
     */
    public function setSecretQuestionAnswer(?string $secretQuestionAnswer): void
    {
        $this->secretQuestionAnswer = $secretQuestionAnswer;
    }


    /**
     * @return string[]
     */
    public function getRoles()
    {
        if($this->getTypeCompte() === "admin") {
            return ["ROLE_ADMIN"];
        }
        return ['ROLE_USER'];
    }

    /**
     * @return string|void|null
     */
    public function getSalt()
    {
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->pseudo;
    }

    /**
     * @param string $username
     */
    public function setUsername(?string $username): void
    {
        $this->pseudo = $username;
    }

}