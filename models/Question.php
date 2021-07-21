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
     * Identifiant en base de données de la bonne réponse
     * @var integer|null
     */
    private int $rightAnswerId;

    /**
     * Crée une nouvelle question
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $text Texte de la question
     * @param integer|null $rightAnswerId Identifiant en base de données de la bonne réponse
     * @param integer|null $rank Rang de la question
     */
    public function __construct(
        ?int $id = null,
        string $text = '',
        ?int $rightAnswerId = null,
        ?int $rank = null
    )
    {
        $this->id = $id;
        $this->text = $text;
        $this->rightAnswer = $rightAnswer;
        $this->rank = $rank;
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
     * Get identifiant en base de données de la bonne réponse
     *
     * @return  integer|null
     */ 
    public function getRightAnswerId(): ?int
    {
        return $this->rightAnswerId;
    }
}
