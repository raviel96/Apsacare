<?php

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration ApsaCare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="admin-container">
        <header>
            <div class="header-container">
                <h1>Admin</h1>
                <a href="/">
                    <i class="fa-solid fa-door-open"></i>
                </a>
            </div>
        </header>
        <main>
            <div class="tabs-container">
                <ul class="tab-list">
                    <li><a href="#dashboard">Tableau de board</a></li>
                    <li><a href="#users">Profil Admin</a></li>
                    <li><a href="#courses">Formations</a></li>
                    <li><a href="#categories">Catégories</a></li>
                </ul>
                <div class="tab-panels">
                    <div id="dashboard">
                        <div class="card">
                            <p><?php echo count($users) ?></p>
                            <p>Administrateurs</p>
                        </div>
                        <div class="card">
                            <p><?php echo count($courses) ?></p>
                            <p>Formations</p>
                        </div>
                        <div class="card">
                            <p><?php echo count($categories) ?></p>
                            <p>Catégories</p>
                        </div>
                    </div>
                    <div id="users">
                        <h2>Profil Admin</h2>
                        <button type="button" class="add-btn btn-primary">Ajouter un admin</button>
                        <?php if (!empty($users)) : ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Identifiant</th>
                                        <th>Email</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $value) : ?>
                                        <tr>
                                            <td data-cell="id"><?php echo $value->id ?></td>
                                            <td data-cell="identifiant"><?php echo $value->username ?></td>
                                            <td data-cell="email"><?php echo $value->email ?></td>
                                            <td data-cell="supprimer"><button type="button" class="btn btn-danger">Supprimer</button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>Aucune donnée dans la table</p>
                        <?php endif ?>
                    </div>
                    <div id="courses">
                        <h2>Formations</h2>
                        <button type="button" class="add-btn btn-primary" data-modal-target="#add-course-modal">Ajouter une formation</button>
                        <?php if (!empty($courses)) : ?>
                            <div class="table-container">
                                <table class="courses-table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Intitulé</th>
                                            <th>Catégorie</th>
                                            <th>Description</th>
                                            <th>Prérequis</th>
                                            <th>Objectifs</th>
                                            <th>Programme</th>
                                            <th>Durée</th>
                                            <th>PDF</th>
                                            <th>Editer</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <?php $count = 0; ?>
                                    <tbody>
                                        <?php foreach ($courses as $value) : ?>
                                            <?php $count++ ?>
                                            <tr>
                                                <td data-cell="id"><?php echo $count ?></td>
                                                <td data-cell="title"><?php echo $value->title ?></td>
                                                <td data-cell="title"><?php echo $value->getCategory($value->categoryId) ?></td>
                                                <td data-cell="description"><?php echo $value->description ?></td>
                                                <td data-cell="acquired"><?php echo $value->acquired ?></td>
                                                <td data-cell="objective"><?php echo $value->objective ?></td>
                                                <td data-cell="program"><?php echo $value->program ?></td>
                                                <td data-cell="duration"><?php echo $value->duration ?></td>
                                                <td data-cell="pdf"><?php echo $value->pdf ?></td>
                                                <td data-cell="editer">
                                                    <button type="button" class="btn-primary" data-modal-target="#edit-course-modal" data-course="<?php echo $value->id ?>">Editer</button>
                                                </td>
                                                <td data-cell="supprimer">
                                                    <button type="button" class="btn-danger" data-delete-button data-modal-target="#delete-course-modal" data-course="<?php echo $value->id ?>">Supprimer</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            <p>Aucune donnée dans la table</p>
                        <?php endif ?>
                    </div>
                    <div id="categories">
                        <h2>Catégories de formation</h2>
                        <button type="button" class="add-btn btn-primary">Ajouter une catégorie</button>
                        <?php if (!empty($categories)) : ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Editer</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $value) : ?>
                                        <tr>
                                            <td data-cell="id"><?php echo $value->id ?></td>
                                            <td data-cell="nom"><?php echo $value->name ?></td>
                                            <td data-cell="editer"><button type="button" class="btn btn-primary">Editer</button></td>
                                            <td data-cell="supprimer"><button type="button" class="btn btn-danger">Supprimer</button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>Aucune donnée dans la table</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php include_once("modals.php") ?>
        </main>
    </div>
    <script src="../js/admin.js"></script>
</body>

</html>