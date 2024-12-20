
            
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
                    <p>Reset your Password.<br>For Free!</p>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Reset password</h2>
                    <form action="" method="post" id="passwordResetForm">
                    
                    <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>">
                    <input type="hidden" name="token" id="token" value="<?= $token ?>">
                   
                        <p> <label>Password<span>*</span></label> <input type="password" placeholder="Password" name="password" id="password" required> </p>
                        <div class="error" id="passwordError"></div>
                        <p> <label>Confim Password<span>*</span></label> <input type="password" placeholder="conPassword" name="conPassword" id="conPassword" required> </p>
                        <div class="error" id="conPasswordError"></div>
                       
                        <p> <button type="submit"  id="submitBtn">Reset Password </button></p>
                      
                    </form>
                    <div id="message" style="color:green;"></div>
                   
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#passwordResetForm').submit(function(e) {
        e.preventDefault();

        $('#passwordError').text('');
        $('#conPasswordError').text('');
        $('#message').text('').removeClass('success error');

        var password = $('#password').val();
        var conPassword = $('#conPassword').val();

        if (password !== conPassword) {
            $('#conPasswordError').text('Passwords do not match.');
            return;
        }
        if (password.length < 6) {
            $('#passwordError').text('Password must be at least 6 characters.');
            return;
        }

        $.ajax({
            url: '<?= base_url("updatePassword") ?>',
            type: 'POST',
            data: $('#passwordResetForm').serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'error') {
                    if (response.errors) {
                        if (response.errors.password) $('#passwordError').text(response.errors.password);
                        if (response.errors.conPassword) $('#conPasswordError').text(response.errors.conPassword);
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




