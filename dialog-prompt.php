<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>JavaScript Dialogs</title>

<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/dialog-prompt.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>

<header>
    <h1>Dialog Prompt</h1>
    <a href="javascript:void(0);">Download</a>
</header>

<ul>
    <li><a href="index.html">Confirm Dialog</a></li>
    <li><a href="dialog-alert.html">Alert Dialog</a></li>
    <li><a href="dialog-prompt.html" class="active">Prompt Dialog</a></li>
</ul>

<div id="my-prompt-dialog" class="dialog-overlay">
    <div class="dialog-card">
        <div class="dialog-question-sign"><i class="fa fa-question"></i></div>
        <div class="dialog-info">
            <h5>What's your name?</h5>
            <input placeholder="Your full name">
            <p>Knowing your name would allow us to provide a more personal service.</p>
            <button class="dialog-confirm-button">Submit</button>
        </div>
    </div>
</div>

<span class="dialog-show-button" data-show-dialog="my-prompt-dialog">Show Prompt Dialog</span>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
// This is an example jQuery snippet that makes the dialog work
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
        // If there was text entered in the text box, alert it
        var textBox = $(this).closest('.dialog-card').find('input');

        if( textBox.val().length ){
            console.log('You entered "' + textBox.val() + '"');
        }

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