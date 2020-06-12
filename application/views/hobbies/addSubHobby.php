<form method="post" action="<?php echo base_url('subHobbiesCreate/'.$hobby->id);?>">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Hobby</label>
                <div class="col-md-9">
                    <input type="text" name="hobby" class="form-control hobby-input" value="<?php echo $hobby->hobby;?>" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 sub-hobby-div">
            <div class="form-group">
                <label class="col-md-3">Sub-Hobby</label>
                <div class="col-md-9" id="dynamicField">
                    <input name="subhobby[]" class="form-control col-md-6 float-left" required><button type="button" name="add" class="btn btn-success add-input float-right">Add More</button>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right mt-3 ml-3">
            <input type="submit" name="Save" class="btn btn-primary">
        </div>
    </div>
</form>
