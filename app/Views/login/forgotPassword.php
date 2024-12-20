

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/login.css') ?>" />
</head>

<body>
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome!</h2>
                     <p>forgot  your password.<br>For Free!</p> 
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Forgot Password</h2>
                    <form action="" method="post" id="passwordResetForm">
                    
                        <p> <label>Email address<span>*</span></label> <input type="eamil" placeholder="Email" name="email" id="email" required> </p>
                        <div class="error" id="emailError"></div>

                       

                       
                        <p> <input type="submit" value="Reset Password" id="submitBtn"> </p>
                        <p>you are member? <a href="login.php">Login</a></p>
                       
                    <div id="message" style="color:red;"></div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#passwordResetForm').submit(function(e) {
        e.preventDefault();

        $('#emailError').text('');
        $('#message').text('').removeClass('success error');

        $.ajax({
            url: '<?= base_url("sendResetLink") ?>',
            type: 'POST',
            data: {
                email: $('#email').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'error') {
                    if (response.errors && response.errors.email) {
                        $('#emailError').text(response.errors.email);
                    }
                    $('#message').text(response.message).addClass('error');
                } else {
                    $('#message').text(response.message).addClass('success');
                }
            },
            error: function() {
                $('#message').text('An error occurred. Please try again.').addClass('error');
            }
        });
    });
</script>

</html>





