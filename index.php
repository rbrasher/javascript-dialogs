<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Javascript Dialogs</title>

<link rel="stylesheet" href="css/styles.css" />
<link rel="stylesheet" href="css/dialog-confirm.css" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />
</head>
<body>
    <header>
        <h1>Confirm Dialog</h1>
    </header>
    
    <ul>
        <li><a href="index.php" class="active">Confirm Dialog</a></li>
        <li><a href="dialog-alert.php">Alert Dialog</a></li>
        <li><a href="dialog-prompt.php">Prompt Dialog</a></li>
    </ul>
    
    <div id="my-confirm-dialog" class="dialog-overlay">
        <div class="dialog-card">
            <div class="dialog-question-sign"><i class="fa fa-question"></i></div>
            
            <div class="dialog-info">
                
                <h5>Are you sure?</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra id odio a pellentesque. In dapibus maximus augue, eu dapibus felis laoreet non.</p>
                
                <button class="dialog-confirm-button">Yes</button>
                <button class="dialog-reject-button">No</button>
                
            </div>
        </div>
    </div>
    
    <span class="dialog-show-button" data-show-dialog="my-confirm-dialog">Show Confirm Dialog</span>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script>
        //This is an example jQuery snippet that makes the dialogs work
        $(document).ready(function() {
            //we have two control functions that show or hide dialogs
            function showDialog(id) {
                //Find the dialog and show it
                var dialog = $('#' + id),
                    card = dialog.find('.dialog-card');
            
                dialog.fadeIn();
                
                //Center it on screen
                card.css({
                    'margin-top': -card.outerHeight() / 2
                });
            }
            
            function hideAllDialogs() {
                //Hide all visible dialogs
                $('.dialog-overlay').fadeOut();
            }
            
            //Here is how to use these functions
            $('.dialog-confirm-button, .dialog-reject-button').on('click', function() {
                hideAllDialogs();
            });
            
            $('.dialog-overlay').on('click', function (e) {
                if(e.target === this){
                    // If the overlay was clicked/touched directly, hide the dialog
                    hideAllDialogs();
                }
            });

            $(document).keyup(function(e) {
                if (e.keyCode === 27) {
                    // When escape is pressed, hide all dialogs
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