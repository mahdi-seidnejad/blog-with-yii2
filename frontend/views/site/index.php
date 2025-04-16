<?php 

use yii\helpers\Html;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dropdown Test</title>

</head>
<body>
<?= Html::dropDownList('tags', null, [
    'php' => 'PHP',
    'yii2' => 'Yii2',
    'js' => 'JavaScript',
], ['id' => 'tag-select', 'class' => 'form-control', 'multiple' => true]) ?>

<div class="container mt-5">
  <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
       data-bs-toggle="dropdown" aria-expanded="false">
      Dropdown link
    </a>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <li><a class="dropdown-item" href="#">Action</a></li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
    </ul>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
