<?php 
/** @var \$this app\core\View */
$this->title = "Formations";
?>
<div class="hero-image formation center">
    <blockquote class="hero-text text-center">
        <h1>Tout est possible à qui rêve, ose, travaille et n'abandonne jamais.</h1>
        <em>- Xavier Dolan</em>
    </blockquote>
</div>
<main>
    <div class="main-container">
        <div class="text-center">
            <h1>Nos <span class="text-highlight">formations</span></h1>
            <img class="title-bottom" src="img/title-bottom.png" alt="" width="50">
        </div>
        <!-- <div class="formation-container">
            <div class="filter-container">
                <div class="filter">
                    <ul>
                        <li>
                            <p>Domaines</p>
                            <button></button>
                        </li>
                        <li>
                            <p>Durée</p>
                            <button></button>
                        </li>
                    </ul>
                </div>
            </div> -->
            <div class="course-container">
                <?php if(!empty($courses)): ?>
                    <?php foreach($courses as $course):?>
                        <div class="card course" data-id="<?php echo $course->id ?>">
                            <p class="course-category"><?php echo $course->getCategory($course->categoryId) ?></p>
                            <h2 class="course-title"><?php echo $course->title ?></h2>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center"><strong>Aucune formation disponible pour le moment.</strong></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>