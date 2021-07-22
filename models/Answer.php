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
     * Récupère toutes les réponses associées à une question
     *
     * @param Question $question La question pour laquelle on souhaite récupérer les réponses
     * @return Answer[]
     */
    static public function findByQuestion(Question $question): array
    {
        // Crée la connexion à la base de données
        $databaseHandler = new PDO('mysql:host=localhost;dbname=quiz', 'root', 'root');
        $statement = $databaseHandler->prepare('SELECT * FROM `answer` WHERE `question_id` = :questionId');
        $statement->execute([ ':questionId' => $question->getId() ]);
        $answersData = $statement->fetchAll();
        foreach ($answersData as $answerData) {
            $answers []= new Answer(
                $answerData['id'],
                $answerData['text'],
                $question
            );
        }
        return $answers;
    }

    /**
     * Crée une nouvelle réponse
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $text Texte de la réponse
     * @param Question|null $question Question à laquelle la réponse est associée 
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
