<div class="container">
    <h2 align="center">Add New Hobbies</h2>
    <div class="form-group">
        <?php echo form_open('add-hobby'); ?>
        <?php $error = form_error("hobby", "<p class='text-danger'>", '</p>'); ?>
        <form name="add_name" method="POST" action="/add-more-post">

            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="text" name="addmore[][name]" placeholder="Enter your Name" class="form-control name_list" required="" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>

        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var i=1;

        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="addmore[][name]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

    });
</script>