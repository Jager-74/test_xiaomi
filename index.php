<?php
/**
 * Created by PhpStorm.
 * User: Jager
 * Date: 08.09.18
 * Time: 12:49
 */
/*
 * Написать форму обратной связи с полями имя, телефон, email без капчи с проверкой заполняемости (сохранять результат не нужно) просто почтовое уведомление
 */
?>
<html>

<head>
    <title>Feedback Form Example</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-xl-8 offset-xl-2 py-5">

            <h1 class="text-center">Feedback Form Example</h1>

            <br>

            <form id="contact-form" method="post" action="contact.php" role="form">

                <div class="messages"></div>

                <div class="controls">

                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_name">First Name *</label>
                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your first name *" required="required" data-error="Firstname is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_lastname">Last Name *</label>
                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your last name *" required="required" data-error="Lastname is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6 offset-md-3">
                            <p class="text-muted"><strong>*</strong> fields are required</p>
                        </div>
                        <div class="col-md-6 offset-md-3">
                            <input type="submit" class="btn btn-success btn-send" value="Send message">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
<script>
    $(function () {
        // init the validator
        $('#contact-form').validator();

        // when the form is submitted
        $('#contact-form').on('submit', function (e) {

            // if the validator does not prevent form submit
            if (!e.isDefaultPrevented()) {
                var url = "contact.php";

                // POST values in the background the the script URL
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $(this).serialize(),
                    success: function (data)
                    {
                        // data = JSON object that contact.php returns

                        // we recieve the type of the message: success x danger and apply it to the
                        var messageAlert = 'alert-' + data.type;
                        var messageText = data.message;

                        // let's compose Bootstrap alert box HTML
                        var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';

                        // If we have messageAlert and messageText
                        if (messageAlert && messageText) {
                            // inject the alert to .messages div in our form
                            $('#contact-form').find('.messages').html(alertBox);
                            // empty the form
                            $('#contact-form')[0].reset();
                        }
                    }
                });
                return false;
            }
        })
    });
</script>
</body>

</html>

