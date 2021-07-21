<?php

/**
 * Représente une réponse
 */
class Answer
{
    /**
     * Identifiant en base de données
     * @var integer|null
     */
    private ?int $id;
    /**
     * Texte de la réponse
     * @var string
     */
    private string $text;
    /**
     * Identifiant en base de données de la question à laquelle la réponse est associée
     * @var integer|null
     */
    private ?int $questionId;

    /**
     * Crée une nouvelle réponse
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $text Texte de la réponse
     * @param integer|null $questionId Identifiant en base de données de la question à laquelle la réponse est associée
     */
    public function __construct(
        ?int $id = null,
        string $text = '',
        ?int $questionId = null
    )
    {
        $this->id = $id;
        $this->text = $text;
        $this->questionId = $questionId;
    }

    /**
     * Get identifiant en base de données
     *
     * @return  integer|null
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get texte de la réponse
     *
     * @return  string
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get identifiant en base de données de la question à laquelle la réponse est associée
     *
     * @return  integer|null
     */ 
    public function getQuestionId()
    {
        return $this->questionId;
    }
}
