<?php $v->layout("_app"); ?>

<div class="container-fluid">
    <h1 class="mt-4">Painel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">Drinks</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
  <table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Militro</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($user->drinks() as $drink):?>
      <tr>
      <th scope="row"><?= $drink->id ?></th>
      <th scope="row"><?= $drink->amount_ml ?></th>
      <th scope="row"><?= date_fmt($drink->created) ?></th>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  </div>
</div>
</div>