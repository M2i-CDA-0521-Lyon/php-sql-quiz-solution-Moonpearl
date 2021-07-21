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
     * Rang de la question
     * @var integer|null
     */
    private ?int $rank;
    /**
     * La bonne réponse
     * @var Answer|null
     */
    private ?Answer $rightAnswer;

    /**
     * Crée une nouvelle question
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $text Texte de la question
     * @param integer|null $rank Rang de la question
     * @param Answer|null $rightAnswer Identifiant en base de données de la bonne réponse
     */
    public function __construct(
        ?int $id = null,
        string $text = '',
        ?int $rank = null,
        ?Answer $rightAnswer = null
    )
    {
        $this->id = $id;
        $this->text = $text;
        $this->rank = $rank;
        $this->rightAnswer = $rightAnswer;
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
     * Récupère la valeur du texte de la question
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
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

    /**
     * Get la bonne réponse
     *
     * @return  Answer|null
     */ 
    public function getrightAnswer(): ?Answer
    {
        return $this->rightAnswer;
    }

    /**
     * Redéfinit la bonne réponse
     *
     * @param Answer|null $answer La nouvelle bonne réponse
     * @return void
     */
    public function setRightAnswer(?Answer $answer)
    {
        $this->rightAnswer = $answer;
    }
}
