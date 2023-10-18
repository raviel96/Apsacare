<?php ?>
<div class="modal" id ="add-course-modal">
    <div class="modal-header">
        <div class="title">
            <p>Ajouter une formation</p>
        </div>
        <button class="close-button" data-close-button>&times;</button>
    </div>
    <div class="modal-body">
        <form action="/portal/admin/course/create" method="post">
            <div class="form-container">
                <div class="form-group grid-span-2">
                    <label for="title">Intitulé</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="form-group category grid-span-2">
                    <label for="categoryId">Catégorie</label>
                    <select class="form-control" name="categoryId" id="categoryId">
                        <option value="">Catégorie</option>
                        <?php if (!empty($categories)) : ?>
                            <?php foreach ($categories as $value) : ?>
                                <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" placeholder="Description..."></textarea>
                </div>
                <div class="form-group">
                    <label for="acquired">Prérequis</label>
                    <textarea class="form-control" name="acquired" placeholder="Prérequis..."></textarea>
                </div>
                <div class="form-group">
                    <label for="objective">Objectifs</label>
                    <textarea class="form-control" name="objective" placeholder="Objectifs..."></textarea>
                </div>
                <div class="form-group">
                    <label for="program">Programme</label>
                    <textarea class="form-control" name="program" placeholder="Programme..."></textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Durée</label>
                    <input class="form-control" type="text" name="duration" id="duration">
                </div>
                <div class="form-group">
                    <label for="pdf">PDF</label>
                    <input class="form-control" type="text" name="pdf" id="pdf">
                </div>
            </div>
            <div class="submit-form">
                <input class="btn-primary" type="submit" value="Ajouter une formation">
            </div>
        </form>
    </div>
</div>
<div class="overlay"></div>

<div class="modal" id ="edit-course-modal">
    <div class="modal-header">
        <div class="title">
            <p>Editer</p>
        </div>
        <button class="close-button" data-close-button>&times;</button>
    </div>
    <div class="modal-body">
        <form class="edit-form" action="/portal/admin/course/update" method="post">
            
        </form>
    </div>
</div>
<div class="modal" id="delete-course-modal">
    <div class="modal-header">
        <div class="title">
            <p>Confirmer la suppression</p>
        </div>
        <button class="close-button" data-close-button>&times;</button>
    </div>
    <div class="modal-body">
        <p>Cette formation sera supprimée. Confirmer ?</p>
    </div>
    <div class="modal-footer">
        <button class="close-button cancel-button" data-close-button>Annuler</button>
        <button class="btn-danger modal-delete-button">Supprimer</button>
    </div>
</div>