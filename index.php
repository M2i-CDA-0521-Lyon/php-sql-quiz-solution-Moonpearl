<?php

include './models/Answer.php';
include './models/Question.php';

// Crée la connexion à la base de données
$databaseHandler = new PDO('mysql:host=localhost;dbname=quiz', 'root', 'root');
// Vérifie si l'utilisateur vient de répondre à une question
$formSubmitted = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer']) && isset($_POST['current-question']);

// Si l'utilisateur vient de répondre à une question
if ($formSubmitted) {
  // Récupère la question précédente en base de données
  $statement = $databaseHandler->prepare('SELECT * FROM `question` WHERE `id` = :id');
  $statement->execute([ ':id' => $_POST['current-question' ] ]);
  $questionData = $statement->fetch();
  $previousQuestion = new Question(
    $questionData['id'],
    $questionData['text'],
    $questionData['rank'],
    $questionData['right_answer_id']
  );
  // Vérifie si la réponse fournie par l'utilisateur correspond à la bonne réponse à la question précédente
  $rightlyAnswered = intval($_POST['answer']) === $previousQuestion->getRightAnswerId();
}

// Récupère la question actuelle en base de données
$statement = $databaseHandler->query('SELECT * FROM `question` ORDER BY `rank` LIMIT 1');
$questionData = $statement->fetch();
$question = new Question(
  $questionData['id'],
  $questionData['text'],
  $questionData['rank'],
  $questionData['right_answer_id']
);

// Récupère les réponses associées à la question actuelle en base de données
$statement = $databaseHandler->prepare('SELECT * FROM `answer` WHERE `question_id` = :questionId');
$statement->execute([ 'questionId' => $question->getId() ]);
$allAnswersData = $statement->fetchAll();
foreach ($allAnswersData as $answerData) {
  $answers []= new Answer(
    $answerData['id'],
    $answerData['text'],
    $answerData['question_id']
  );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->   
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <h1>Quizz</h1>

    <?php if ($formSubmitted): ?>
    <!-- Affiche une alerte uniquement si l'utilisateur vient de répondre à une question -->
    <div id="answer-result" class="alert alert-<?php if ($rightlyAnswered) { echo 'success'; } else { echo 'danger'; } ?>">
      <i class="fas fa-thumbs-<?php if ($rightlyAnswered) { echo 'up'; } else { echo 'down'; } ?>"></i>
      <!-- Affiche un texte différent selon que l'utilisateur a bien répondu à la question ou non -->
      <?php if ($rightlyAnswered): ?>
        Bravo, c'était la bonne réponse!
      <?php else: ?>
        Hé non! La bonne réponse était <strong>...</strong>
      <?php endif; ?>
    </div>
    <?php endif; ?>

    <h2 class="mt-4">Question n°<span id="question-id"><?= $question->getRank() ?></span></h2>
    <form id="question-form" method="post">
      <p id="current-question-text" class="question-text"><?= $question->getText() ?></p>

      <div id="answers" class="d-flex flex-column">

        <?php foreach ($answers as $answer): ?>
        <div class="custom-control custom-radio mb-2">
          <input class="custom-control-input" type="radio" name="answer" id="answer<?= $answer->getId() ?>" value="<?= $answer->getId() ?>">
          <label class="custom-control-label" for="answer<?= $answer->getId() ?>" id="answer<?= $answer->getId() ?>-caption"><?= $answer->getText() ?></label>
        </div>
        <?php endforeach; ?>

      </div>
      
      <input type="hidden" name="current-question" value="<?= $question->getId() ?>" />
      <button type="submit" class="btn btn-primary">Valider</button>
    </form>
  </div>
</body>
</html>