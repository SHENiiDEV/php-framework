<form method="post" action="/main/contact" novalidate="novalidate">
    <input type="hidden" name="language" id="language" value="<?=$lang?>">
    <div class="form-group"> <label class="sr-only" for="name">Name</label> <input type="text" name="name" placeholder="<?= __('form_info_name')?>" class="r-form-1-name form-control" id="name"> </div>
    <div class="form-group"> <label class="sr-only" for="email">Email</label> <input type="text" name="email" placeholder="<?= __('form_info_email')?>" class="r-form-1-email form-control" id="email"> </div>
    <div class="form-group"> <label class="sr-only" for="phone">Telefon</label> <input type="text" name="phone" placeholder="<?= __('form_info_number')?>" class="r-form-1-phone form-control" id="phone"> </div>
    <div class="form-group"> <label class="sr-only" for="comment">Nachricht</label> <textarea name="comment" placeholder="<?= __('form_info_message')?>" class="c-form-1-message form-control" id="comment"></textarea> </div>
    <p class="terms"><?= __('form_info_datenshutz')?></p>
    <button type="submit" class="btn"><?= __('form_info_button_text')?></button>
    <p class="terms"><?= __('form_info_footer_text')?></p>
                    </form>