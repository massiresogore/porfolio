<!-- SECTION CONTACT -->
<section class="section section-contact " id="section--contact">
  <span id="error" style="display: none;"><?= count($model->error) ?></span>

  <div class="contact-container">

    <h1>Me contacter</h1>
    <p><mark>L'envoie de contact n'est pas encore activé</mark> la base de donnée est en cour de configuration 😌</p>
    <p class="erreur-feedback"><?= $model->getAllErrors() ?? "" ?></p>
    <?= $form->formStart('', 'post') ?>

    <?= $form->field('name', $model)->plaholderName() ?>
    <?= $form->field('email', $model)->placeholderEmail()->typeEmail() ?>
    <?php $form->field('text', $model)->getTextArea() ?>
    <input id="submit" type="submit" value="Envoyer">
    <?= $form->formEnd() ?>
  </div>
</section>