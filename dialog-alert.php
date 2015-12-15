<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>JavaScript Dialogs</title>

<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/dialog-alert.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>

<header>
    <h1>Dialog Alert</h1>
    <a href="javascript:void(0);">Download</a>
</header>

<ul>
    <li><a href="index.php">Confirm Dialog</a></li>
    <li><a href="dialog-alert.php" class="active">Alert Dialog</a></li>
    <li><a href="dialog-prompt.php">Prompt Dialog</a></li>
</ul>

<div id="my-success-dialog" class="dialog-overlay">
    <div class="dialog-card">
        <div class="dialog-success-sign"><i class="fa fa-check"></i></div>
        <div class="dialog-info">
            <h5>All tests pass!</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra id odio a pellentesque. In dapibus maximus augue, eu dapibus felis laoreet non. Aliquam ac ex fringilla, faucibus orci id, facilisis quam.</p>
            <button class="dialog-confirm-button">OK</button>
        </div>
    </div>
</div>

<div id="my-error-dialog" class="dialog-overlay">
    <div class="dialog-card">
        <div class="dialog-error-sign"><i class="fa fa-exclamation"></i></div>
        <div class="dialog-info">
            <h5>There has been an error!</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra id odio a pellentesque. In dapibus maximus augue, eu dapibus felis laoreet non. Aliquam ac ex fringilla, faucibus orci id, facilisis quam.</p>
            <button class="dialog-confirm-button">OK</button>
        </div>
    </div>
</div>

<span class="dialog-show-button" data-show-dialog="my-error-dialog">Show Error Dialog</span>
<span class="dialog-show-button" data-show-dialog="my-success-dialog">Show Success Dialog</span>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    // This is an example jQuery snippet that makes the dialogs work
    $(document).ready(function() {
        // We have two control functions that show or hide dialogs
        function showDialog(id){
            // Find the dialog and show it
            var dialog = $('#' + id),
                card = dialog.find('.dialog-card');

            dialog.fadeIn();

            // Center it on screen
            card.css({
                'margin-top' : -card.outerHeight()/2
            });
        }

        function hideAllDialogs(){

            // Hide all visible dialogs
            $('.dialog-overlay').fadeOut();

        }

        // Here is how to use these functions

        $('.dialog-confirm-button').on('click', function () {

            // Hide the dialog when the confirm button is pressed
            hideAllDialogs();

        });

        $('.dialog-overlay').on('click', function (e) {

            if(e.target === this){
                // If the overlay was clicked/touched directly, hide the dialog
                hideAllDialogs();
            }


        });

        $(document).keyup(function(e) {

            // When escape is pressed, hide all dialogs:

            if (e.keyCode === 27) {
                hideAllDialogs();
            }

        });


        // Here, we are listening for clicks on the "show dialog" buttons,
        // and showing the correct dialog

        $('.dialog-show-button').on('click', function () {

            // Take the contents of the  "data-show-dialog" attribute
            var toShow = $(this).data('show-dialog');

            showDialog(toShow);
        });
    });

</script>

</body>

</html>
