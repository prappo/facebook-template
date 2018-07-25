<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FeBe Login</title>
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        html {
            background: #E2E2E2;
        }

        body {
            background: #E2E2E2;
            margin: 0;
            padding: 0;
            font-family: 'Lato', sans-serif;
        }

        .login-form-wrap {
            background: radial-gradient(ellipse at center, #5170ad 0%, #355493 100%);
            border: 1px solid #2d416d;
            -webkit-box-shadow: 0 1px #5670A4 inset, 0 0 10px 5px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px #5670A4 inset, 0 0 10px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 360px;
            height: 220px;
            margin: 60px auto;
            padding: 15px 20px 0 20px;
            text-align: center;
        }

        .login-form-wrap h1 {
            margin: 0 0 20px 0;
            padding: 0;
            font-size: 26px;
            color: #fff;
        }

        .login-form-wrap h5 {
            margin-top: 40px;
        }

        .login-form-wrap h5 > a {
            font-size: 14px;
            color: #fff;
            text-decoration: none;
            font-weight: 400;
        }

        .login-form input[type="email"], .login-form input[type="password"] {
            width: 100%;
            border: 1px solid #314d89;
            outline: none;
            padding: 12px 20px;
            color: #afafaf;
            font-weight: 400;
            font-family: 'Lato', sans-serif;
            cursor: pointer;
        }

        .login-form input[type="email"] {
            border-bottom: none;
            border-radius: 4px 4px 0 0;
            padding-bottom: 13px;
            -webkit-box-shadow: 0 -1px 0 #E0E0E0 inset, 0 1px 2px rgba(0, 0, 0, 0.23) inset;
            box-shadow: 0 -1px 0 #E0E0E0 inset, 0 1px 2px rgba(0, 0, 0, 0.23) inset;
        }

        .login-form input[type="password"] {
            border-top: none;
            border-radius: 0 0 4px 4px;
            -webkit-box-shadow: 0 -1px 2px rgba(0, 0, 0, 0.23) inset, 0 1px 2px rgba(255, 255, 255, 0.1);
            box-shadow: 0 -1px 2px rgba(0, 0, 0, 0.23) inset, 0 1px 2px rgba(255, 255, 255, 0.1);
        }

        .login-form input[type="submit"] {
            font-family: 'Lato', sans-serif;
            font-weight: 400;
            background: -webkit-gradient(linear, left top, left bottom, from(#e0e0e0), to(#cecece));
            background: linear-gradient(to bottom, #e0e0e0 0%, #cecece 100%);
            display: block;
            margin: 20px auto 0 auto;
            width: 100%;
            border: none;
            border-radius: 3px;
            padding: 8px;
            font-size: 17px;
            color: #636363;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.45);
            font-weight: 700;
            -webkit-box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.17), 0 1px 0 rgba(255, 255, 255, 0.36) inset;
            box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.17), 0 1px 0 rgba(255, 255, 255, 0.36) inset;
        }



        .login-form input[type="submit"]:hover {
            background: #DDD;
        }

        .login-form input[type="submit"]:active {
            padding-top: 5px;
            padding-bottom: 5px;
            background: #C9C9C9;
        }

    </style>
</head>
<body>
<section class="login-form-wrap">
    <h1>FeBe</h1>

    <?php echo $__env->yieldContent('content'); ?>

</section>
</body>
</html>