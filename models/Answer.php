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
     * Question à laquelle la réponse est associée
     * @var Question|null
     */
    private ?Question $question;

    /**
     * Crée une nouvelle réponse
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $text Texte de la réponse
     */
    public function __construct(
        ?int $id = null,
        string $text = '',
        ?Question $question = null
    )
    {
        $this->id = $id;
        $this->text = $text;
        $this->question = $question;
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
     * Get question à laquelle la réponse est associée
     *
     * @return  Question|null
     */ 
    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    /**
     * Redéfinit la question à laquelle la réponse est associée
     *
     * @param Question|null $question La nouvelle question à associer
     * @return void
     */
    public function setQuestion(?Question $question)
    {
        $this->question = $question;
    }
}
