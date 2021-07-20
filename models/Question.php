<?php

/**
 * Représente une question
 */
class Question
{
    /**
     * Identifiant en base de données
     * @var integer|null
     */
    private ?int $id;
    /**
     * Texte de la question
     * @var string
     */
    private string $text;
    /**
     * Texte de la réponse numéro 1
     * @var string
     */
    private string $answer1;
    /**
     * Texte de la réponse numéro 2
     * @var string
     */
    private string $answer2;
    /**
     * Texte de la réponse numéro 3
     * @var string
     */
    private string $answer3;
    /**
     * Texte de la réponse numéro 4
     * @var string
     */
    private string $answer4;
    /**
     * Numéro de la bonne réponse
     * @var integer
     */
    private int $rightAnswer;
    /**
     * Rang de la question
     * @var integer|null
     */
    private ?int $rank;

    /**
     * Crée une nouvelle question
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $text Texte de la question
     * @param string $answer1 Texte de la réponse numéro 1
     * @param string $answer2 Texte de la réponse numéro 2
     * @param string $answer3 Texte de la réponse numéro 3
     * @param string $answer4 Texte de la réponse numéro 4
     * @param integer $rightAnswer Numéro de la bonne réponse
     * @param integer|null $rank Rang de la question
     */
    public function __construct(
        ?int $id = null,
        string $text = '',
        string $answer1 = '',
        string $answer2 = '',
        string $answer3 = '',
        string $answer4 = '',
        int $rightAnswer = 1,
        ?int $rank = null
    )
    {
        $this->id = $id;
        $this->text = $text;
        $this->answer1 = $answer1;
        $this->answer2 = $answer2;
        $this->answer3 = $answer3;
        $this->answer4 = $answer4;
        $this->rightAnswer = $rightAnswer;
        $this->rank = $rank;
    }

    /**
     * Récupère la valeur du texte de la question
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Get identifiant en base de données
     *
     * @return  integer|null
     */ 
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get texte de la réponse numéro 1
     *
     * @return  string
     */ 
    public function getAnswer1(): string
    {
        return $this->answer1;
    }

    /**
     * Get texte de la réponse numéro 2
     *
     * @return  string
     */ 
    public function getAnswer2(): string
    {
        return $this->answer2;
    }

    /**
     * Get texte de la réponse numéro 3
     *
     * @return  string
     */ 
    public function getAnswer3(): string
    {
        return $this->answer3;
    }

    /**
     * Get texte de la réponse numéro 4
     *
     * @return  string
     */ 
    public function getAnswer4(): string
    {
        return $this->answer4;
    }

    /**
     * Get numéro de la bonne réponse
     *
     * @return  integer
     */ 
    public function getRightAnswer(): int
    {
        return $this->rightAnswer;
    }

    /**
     * Get rang de la question
     *
     * @return  integer|null
     */ 
    public function getRank(): ?int
    {
        return $this->rank;
    }
}
