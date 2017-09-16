<?= $this->getContent() ?>

<div align="center" class="login-form padding20 block-shadow" style="opacity: 1; transform: scale(1); transition: 0.5s;">
<h1 class="text-light">Your Profile Page</h1>
<hr class="thin">
<?= $user->name ?>
<?= $location->language ?>
 <?= $this->tag->form([]) ?>
    <div class="input-control modern text iconic" data-role="input">
        <?= $form->render('id') ?>
        <span class="label">Your email</span>
        <span class="informer">Please enter you login or email</span>
        <span class="placeholder">Input email</span>
        <span class="icon mif-user"></span>
    </div>
 
    <br />
    
    <button type="submit" class="image-button icon-right" value="Enter">
        Enter<span class="icon mif-enter"></span>
    </button>
    
    <br />
    <?= $this->tag->linkTo(['user/edit', 'Edit your profile']) ?>
 </form>
</div>