/*
* Create.php JS
* */
$(document).ready(function(){
    // Bind keyup event on the input
    $('.hobby-input').keyup(function() {
        // If value is not empty
        if ($(this).val().length == 0) {
            // Hide the element
            $('.sub-hobby-div').hide();
        } else {
            // Otherwise show it
            $('.sub-hobby-div').show();
        }
    }).keyup();

    let i=1;
    $('.add-input').click(function(){
        i++;
        $('#dynamicField').append('' +
            '<div id="row'+i+'">' +
            '<input type="text" name="subhobby[]" placeholder="Enter your sub-hobby" class="form-control col-md-6 float-left name_list" required />' +
            '<button type="button" name="remove" id="'+i+'" class="btn btn-danger float-right btn_remove">X</button>' +
            '</div>');
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });

});