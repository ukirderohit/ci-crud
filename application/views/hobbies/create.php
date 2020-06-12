<form method="post" action="<?php echo base_url('hobbiesCreate');?>">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 mt-3">
            <div class="form-group">
                <label class="col-md-3">Please Enter your Hobby:</label>
                <div class="col-md-9">
                    <input placeholder="Enter your hobby" type="text" name="hobby" class="form-control hobby-input" required>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 sub-hobby-div">
            <div class="form-group">
                <label class="col-md-9">Please Enter your Sub-Hobby:</label>
                <div class="col-md-9" id="dynamicField">
                    <input name="subhobby[]" placeholder="Enter your sub-hobby" class="form-control col-md-6 float-left" required><button type="button" name="add" class="col-md-3 btn btn-success float-right add-input">Add More</button>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right ml-3 mt-3">
            <input type="submit" name="Save" class="btn btn-primary">
        </div>
    </div>
</form>