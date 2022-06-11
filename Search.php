<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <input type="text" class="form-control" id="searchid" placeholder="Search for plates...." >

    <div id="searchresult"> </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#searchid").keyup(function() {
                var input = $(this).val();

                //alert(input);

                if (input != "") {
                    $.ajax({
                        url: "livesearch.php", //law mesh fadya khosh 3al php dah w khod el input
                        method: "POST",
                        data: {input: input},

                        success: function(data) {
                            $("#searchresult").html(data); // ama t success el data hatezhar fo2 fea el div section 
                        }
                    });
                } else {

                    $("#searchresult").css("display", "none");
                    $('#searchresult').css('display', 'block');
 
                $("#searchid").focusout(function(){
                    $('#searchresult').css('display', 'none');
                });
                $("#searchid").focusin(function(){
                    $('#searchresult').css('display', 'block');
                });
                }
            });
        });
    </script>
</body>

</html>