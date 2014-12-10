<script>
    $(document).ready(function()//When the dom is ready
    {
        $("#check").click(function()
        { //if theres a change in the username textbox

            var username = $("#acc_no").val();//Get the value in the username textbox
            if(username.length > 0)//if the lenght greater than 3 characters
            {
                $("#availability_status").html('Checking availability...');
                //Add a loading image in the span id="availability_status"

                $.ajax({  //Make the Ajax Request
                    type: "POST",
                    url: "<?php echo site_url("admin/info/check_acc_no"); ?>",  //file name
                    data: "username="+ username,  //data
                    success: function(server_response){

                        $("#availability_status").ajaxComplete(function(event, request){

                            if(server_response == '0')//if ajax_check_username.php return value "0"
                            {
                                $("#availability_status").html('<font color="Green">Member no is Available </font>');
                                //add this image to the span with id "availability_status"
                            }
                            else  if(server_response == '1')//if it returns "1"
                            {
                                $("#availability_status").html('<font color="red">Member no is already taken.</font>');
                            }

                        });
                    }

                });

            }
            else
            {

                $("#availability_status").html('<font color="#cc0000">Please input an Member number</font>');
                //if in case the username is less than or equal 3 characters only
            }
            return false;
        });
    });

</script>
<script>
    $(document).ready(function()//When the dom is ready
    {
        $("#check1").click(function()
        { //if theres a change in the username textbox

            var username = $("#acc_no").val();//Get the value in the username textbox
            if(username.length > 0)//if the lenght greater than 3 characters
            {
                $("#status").html('Checking availability...');
                //Add a loading image in the span id="availability_status"

                $.ajax({  //Make the Ajax Request
                    type: "POST",
                    url: "<?php echo site_url("admin/info/check_acc_no_loan"); ?>",  //file name
                    data: "username="+ username,  //data
                    success: function(server_response){

                        $("#availability_status").ajaxComplete(function(event, request){

                            if(server_response == '0')//if ajax_check_username.php return value "0"
                            {
                                $("#availability_status").html('<font color="red">Account no is Available</font>');
                                //add this image to the span with id "availability_status"
                            }
                            else  if(server_response == '1')//if it returns "1"
                            {
                                $("#availability_status").html('<font color="Green">Account no is already taken.</font>');
                            }

                        });
                    }

                });

            }
            else
            {

                $("#availability_status").html('<font color="#cc0000">Please input account number</font>');
                //if in case the username is less than or equal 3 characters only
            }
            return false;
        });
    });

</script>  




