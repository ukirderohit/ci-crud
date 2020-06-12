<form method="post" action="<?php echo base_url('hobbies/update/'.$hobby->id);?>">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Hobby</label>
                <div class="col-md-9">
                    <input type="text" name="hobby" class="form-control" value="<?php echo $hobby->hobby; ?>" required>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Description</label>
                <?php foreach ($subhobby as $val) {
                   ?><div class="col-md-9">
                    <input name="subhobby[<?php echo $val->subid;?>][]" class="form-control" value="<?php echo $val->subhobby; ?>" required>
                    </div><?php
                }?>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right mt-3 ml-3">
            <input type="submit" name="Save" class="btn btn-primary">
        </div>
    </div>
</form>