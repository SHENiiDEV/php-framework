<div class="modal fade" id="set-language" tabindex="-1" role="dialog" aria-labelledby="rasterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Schließen"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="rasterModalLabel"><?=__('select_language')?></h4>
            </div>
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        new \fw\widgets\language\Language();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>