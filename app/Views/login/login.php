<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/login.css') ?>" />
</head>

<body>
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome!</h2>
                    <p>Create your account.<br>For Free!</p> <a href="" class="btn">Sign Up</a>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="" method="post">
                        <p> <input type="hidden" placeholder="Username" name="username" id="username"> </p>
                        <p> <label>Email address<span>*</span></label> <input type="text" placeholder="Email" name="email" id="email"> </p>
                        <div class="error" id="emailError"></div>



                        <p> <label>Password<span>*</span></label> <input type="password" placeholder="Password" name="password" id="password"> </p>
                        <div class="error" id="passwordError"></div>
                         <button type="button" id="submitBtn" class="btn btn-dark pt-4">Sign In</button> 
                        <p> <a href="<?= base_url('/forgotPassword')?>">Forgot password?</a> </p>
                    </form>
                    <div id="message" style="color:red;"></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitBtn').click(function() {
            $('#message').html('');
            $('#emailError').html('');
            $('#passwordError').html('');

            $.ajax({
                url: "<?= site_url('login/authenticate'); ?>",
                method: "POST",
                data: {
                    email: $('#email').val(),
                    password: $('#password').val()
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'error') {
                        if (response.errors) {
                            $('#emailError').html(response.errors.email || '');
                            $('#passwordError').html(response.errors.password || '');
                        } else {
                            $('#message').html(`<p style="color:red;">${response.message}</p>`);
                        }
                    } else if (response.status === 'success') {
                        window.location.href = response.redirect_url;
                    }
                },
                error: function() {
                    $('#message').html('<p style="color:red;">Something went wrong. Please try again later.</p>');
                }
            });
        });
    });
</script>

</html>