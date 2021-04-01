 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
         @import url(https://fonts.googleapis.com/css?family=Roboto:300);

         .login-page {
             width: 360px;
             padding: 8% 0 0;
             margin: auto;
         }

         .form {
             position: relative;
             z-index: 1;
             background: #FFFFFF;
             max-width: 360px;
             margin: 0 auto 100px;
             padding: 45px;
             text-align: center;
             box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
             border-radius: 3px;
         }

         .form input {
             font-family: "Roboto", sans-serif;
             outline: 0;
             background: #f2f2f2;
             width: 100%;
             border: 0;
             margin: 0 0 15px;
             padding: 15px;
             box-sizing: border-box;
             font-size: 14px;
         }

         .form button {
             font-family: "Roboto", sans-serif;
             text-transform: uppercase;
             outline: 0;
             background: #4a7dda;
             width: 100%;
             border: 0;
             padding: 15px;
             color: #FFFFFF;
             font-size: 14px;
             -webkit-transition: all 0.3 ease;
             transition: all 0.3 ease;
             cursor: pointer;
             transition: 350ms all;
         }

         .form button:hover,
         .form button:active,
         .form button:focus {
             background: #4074d2;
         }

         .form .message {
             margin: 15px 0 0;
             color: #b3b3b3;
             font-size: 12px;
         }

         .form .message a {
             color: #4CAF50;
             text-decoration: none;
         }

         .form .register-form {
             display: none;
         }

         .container {
             position: relative;
             z-index: 1;
             max-width: 300px;
             margin: 0 auto;
         }

         .container:before,
         .container:after {
             content: "";
             display: block;
             clear: both;
         }

         .container .info {
             margin: 50px auto;
             text-align: center;
         }

         .container .info h1 {
             margin: 0 0 15px;
             padding: 0;
             font-size: 36px;
             font-weight: 300;
             color: #1a1a1a;
         }

         .container .info span {
             color: #4d4d4d;
             font-size: 12px;
         }

         .container .info span a {
             color: #000000;
             text-decoration: none;
         }

         .container .info span .fa {
             color: #EF3B3A;
         }

         body {
             font-family: "Roboto", sans-serif;
             -webkit-font-smoothing: antialiased;
             -moz-osx-font-smoothing: grayscale;
             background: #4074d2;

         }
     </style>
 </head>

 <body>
     <div class="login-page">

         <div class="form">
             <h3 class="form-heading">Login</h3>
             <?php
                if (!empty($_GET['error'])) {
                    $error = unserialize(urldecode($_GET['error']));
                    foreach ($error as $key => $value) {
                        echo '<p style="color:#ca5353;font-weight:bold;margin-bottom: 20px;background: #ff000036; border-radius: 10px; padding: 10px 30px">' . $value . '</p>';
                    }
                }
                ?>

             <form method="POST" autocomplete="off" action="<?php echo BASE_URL ?>/khachhang/login_customer/">

                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="username" name="username" id="name" required>
                 </div>
                 <div class="form-group">

                     <input type="password" class="form-control" name="password" id="sdt" required>
                 </div>
                 <!-- <input type="submit" class="btn btn-primary" name="dangnhap" id="frmSubmit" value="Đăng nhập"> -->
                 <button type="submit" name="login">Login</button>
             </form>
             <br>
             <p class="message">Not registered? <a href="<?php echo BASE_URL ?>/khachhang/dangky">Create an account</a></p>
         </div>
     </div>



     </div>
 </body>
 <script>
     $('.message a').click(function() {
         $('form').animate({
             height: "toggle",
             opacity: "toggle"
         }, "slow");
     });
 </script>

 </html>