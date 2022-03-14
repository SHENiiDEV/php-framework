<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text wow fadeInLeft">
                <h1><?= __('header_title_index')?></h1>
                <div class="description">
                    <p class="medium-paragraph"><?= __('header_subtitle_index')?></p>
                </div>
            </div>
            <div class="col-sm-5 col-sm-offset-1 r-form-1-box wow fadeInUp">
                <div class="r-form-1-top">
                    <h3><?= __('form_title_index')?></h3>
                </div>
                <div class="r-form-1-bottom">
                    <!--- FORM --->
                    <? include  APP . "/widgets/form/contact_form.php"; ?>

                    <!--- FORM --->
                </div>
            </div>
        </div>
    </div>
</div>
<!--- Info Block -->
<div class="features-container section-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 features wow fadeInLeft">
                <h2><?= __('main_aboutus_title')?></h2>
                <div class="divider-1">
                    <div class="line"></div>
                </div>
                <p class="medium-paragraph"><?=__('main_aboutus_info')?></p>
                <div class="features-button"> <a class="btn btn-link-1 scroll-link" href="#top-content"><?=__('main_aboutus_button')?></a> </div>
            </div>
            <div class="col-sm-7 col-sm-offset-1 wow fadeInUp">
                <div class="row">
                    <div class="col-sm-6 features-box">
                        <div class="features-box-icon"><i class="fa fa-institution"></i></div>
                        <h3><?= __('main_aboutus_block1_title')?></h3>
                        <p><?= __('main_aboutus_block1_info')?></p>
                    </div>
                    <div class="col-sm-6 features-box">
                        <div class="features-box-icon"><i class="fa fa-support"></i></div>
                        <h3><?= __('main_aboutus_block2_title')?></h3>
                        <p><?= __('main_aboutus_block2_info')?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 features-box">
                        <div class="features-box-icon"><i class="fa fa-bus"></i></div>
                        <h3><?= __('main_aboutus_block3_title')?></h3>
                        <p><?= __('main_aboutus_block3_info')?></p>
                    </div>
                    <div class="col-sm-6 features-box">
                        <div class="features-box-icon"><i class="fa fa-handshake-o"></i></div>
                        <h3><?= __('main_aboutus_block4_title')?></h3>
                        <p><?= __('main_aboutus_block4_info')?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--- Info Block -->
<!--- Blockquote -->
<div class="testimonials-container section-container section-container-image-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 testimonials wow fadeInLeft">
                <h2><?= __('main_important_title')?></h2>
            </div>
            <div class="col-sm-7 col-sm-offset-1 testimonial-list wow fadeInUp">
                <p class="medium-paragraph"><?= __('main_important_info')?>
                <p class="medium-paragraph"><i><?= __('main_importrant_info_2')?></i></p>
            </div>
        </div>
    </div>
</div>
<!--- Blockquote -->
<!--- Leistungen -->
<div class="about-us-container section-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 about-us section-description wow fadeIn">
                <h2><?=__('fuhrpark_title')?></h2>
                <div class="divider-1">
                    <div class="line"></div>
                </div>
                <p class="medium-paragraph"><?=__('fuhrpark_info')?></p>
            </div>
        </div>
        <div id="lightgallery" class="row">
            <? foreach ($cars as $k => $car): ?>
            <div class="col-sm-4" data-src="<?=$car->img?>" data-title="<?=$car->name?>">
                <div class="thumbnail-zoom">
                    <div class="overlay"></div>
                    <div class="figcap no-title">
                        <i class="fa fa-search-plus"></i>
                        <p><?=$car->name?></p>
                    </div>
                    <img src="<?=$car->img?>" alt="<?=$car->name?>">
                    <div class="about-us-role"><?=$car->name?></div>
                </div>
                <h3><?=$car->name?></h3>
                <p><?=$car->infobox?></p>
            </div>
            <?endforeach;?>
        </div>
    </div>
</div>
<!--- Leistungen -->