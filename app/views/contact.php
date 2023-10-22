<?php

/** @var \$this app\core\View */

use app\core\Application;

$this->title = "Contact";
?>
<div class="hero-image contact center">
    <blockquote class="hero-text text-center">
        <h1>Peu importe si le début paraît petit.</h1>
        <p>- Henry David Thoreau</p>
    </blockquote>
</div>
<?php if(Application::$app->getSession()->getFlash("success")): ?>
    <div class="alert alert-success">
        <p><?php echo Application::$app->getSession()->getFlashMessage("success") ?></p>
    </div>
<?php elseif(Application::$app->getSession()->getFlash("error")): ?>
    <div class="alert alert-error">
        <p><?php echo Application::$app->getSession()->getFlashMessage("error") ?></p>
    </div>
<?php endif; ?>
<main>
    <div class="main-container">
        <section class="section-contact">
            <div class="section-container">
                <div class="text-center">
                    <h2 class="section-title">Nous <span class="text-highlight">contacter</span></h2>
                    <img class="title-bottom" src="img/title-bottom.png" alt="" width="50">
                </div>
                <div class="contact-container">
                    <div class="form grid-span-2">
                        <div class="form-head">
                            <h3>Envoyer un message</h3>
                            <p>* champs obligatoires</p>
                        </div>
                        <form id="contact-form" action="/contact" method="post">
                            <div class="form-container">
                                <div class="form-group">
                                    <label for="subject">Objet du message *</label>
                                    <select class="form-control <?php echo $model->hasErrors('subject') ? 'is-invalid' : ''; ?>" name="subject" id="subject" required>
                                        <option value="Demande d'information">Demande d'information</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $model->getFirstError('subject'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="status">Vous êtes *</label>
                                    <select class="form-control <?php echo $model->hasErrors('status') ? 'is-invalid' : ''; ?>" name="status" id="status" required>
                                        <option value="particulier">Particulier</option>
                                        <option value="professionnel">Professionnel</option>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $model->getFirstError('status'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Nom *</label>
                                    <input class="form-control <?php echo $model->hasErrors('lastname') ? 'is-invalid' : ''; ?>" type="text" name="lastname" id="lastname" placeholder="Nom" value="<?php echo $model->lastname ?>" required>
                                    <span class="invalid-feedback"><?php echo $model->getFirstError('lastname'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Prénom *</label>
                                    <input class="form-control <?php echo $model->hasErrors('firstname') ? 'is-invalid' : ''; ?>" type="text" name="firstname" id="firstname" placeholder="Prénom" value="<?php echo $model->firstname ?>" required>
                                    <span class="invalid-feedback"><?php echo $model->getFirstError('firstname'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control <?php echo $model->hasErrors('email') ? 'is-invalid' : ''; ?>" type="email" name="email" id="email" placeholder="Email" value="<?php echo $model->email ?>">
                                    <span class="invalid-feedback"><?php echo $model->getFirstError('email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Téléphone *</label>
                                    <input class="form-control <?php echo $model->hasErrors('phone') ? 'is-invalid' : ''; ?>" type="tel" name="phone" id="phone" placeholder="Téléphone" required>
                                    <span class="invalid-feedback"><?php echo $model->getFirstError('phone'); ?></span>
                                </div>
                                <div class="form-group grid-span-2">
                                    <label for="message">Message *</label>
                                    <textarea class="form-control <?php echo $model->hasErrors('message') ? 'is-invalid' : ''; ?>" name="message" id="message" placeholder="Votre message..." required><?php echo $model->message ?></textarea>
                                    <span class="invalid-feedback"><?php echo $model->getFirstError('message'); ?></span>
                                </div>
                            </div>
                            <input type="submit" name="submit" id="submit" value="Envoyer">
                        </form>
                    </div>
                    <div class="contact">
                        <h3>Contact</h3>
                        <div class="contact-info">
                            <span><i class="fa-solid fa-location-dot"></i></span>
                            <p>41 Rue du Chevalier Vicomte de Bragelogne</p>
                        </div>
                        <div class="contact-info">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            <a href="mailto:contact@apsacare.fr">contact@apsacare.fr</a>
                        </div>
                        <div class="contact-info">
                            <span><i class="fa-solid fa-phone"></i></span>
                            <a href="tel:0590464509">0590 464 509</a>
                        </div>
                        <ul class="contact-social">
                            <li>
                                <a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/paips16.18/"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1476.2138338208097!2d-61.46014909756194!3d16.33187244705271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c133636ba472d6d%3A0xf086af3248e5a6a2!2s43%20Rue%20du%20Chevalier%20Vicomte%20de%20Bragelongne%2C%20Morne-%C3%A0-l&#39;Eau%2097111%2C%20Guadeloupe!5e0!3m2!1sfr!2sfr!4v1692304631059!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>