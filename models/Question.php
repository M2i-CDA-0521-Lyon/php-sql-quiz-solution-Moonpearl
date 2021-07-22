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
     * Récupère une question en base de données en fonction de son identifiant
     *
     * @param integer $id Identifiant de la question à récupérer
     * @return Question|null
     */
    static public function findById(int $id): ?Question
    {
        // Crée la connexion à la base de données
        $databaseHandler = new PDO('mysql:host=localhost;dbname=quiz', 'root', 'root');
        $statement = $databaseHandler->prepare('SELECT * FROM `question` WHERE `id` = :id');
        $statement->execute([ ':id' => $id ]);
        $questionData = $statement->fetch();
        // Si la requête ne renvoie pas de résultat, c'est donc que l'enregistrement demandé n'existe pas
        if ($questionData === false) {
            // Renvoie null au lieu de renvoyer un objet
            return null;
        }
        // Sinon, renvoie un objet construit à partir de l'enregistrement demandé
        return new Question(
            $questionData['id'],
            $questionData['text'],
            $questionData['rank']
        );
    }

    /**
     * Crée une nouvelle question
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $text Texte de la question
     * @param integer|null $rank Rang de la question
     * @param Answer|null $rightAnswer La bonne réponse
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
