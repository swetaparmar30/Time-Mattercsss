<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@500;600;700&display=swap');
        
        body {
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #efefef;
            margin: 0;
            padding: 0;
            color: #1f1f1f;
        }
        .email-wrapper {
            width: 100%;
            background-color: #efefef;
            padding: 40px 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #ffffff;
            padding: 40px 30px;
            text-align: center;
            border-bottom: 1px solid #d8d8d8;
        }
        .header img {
            max-width: 280px;
            height: auto;
        }
        .content {
            padding: 50px 40px;
            line-height: 1.6;
        }
        .content h1 {
            font-family: 'Raleway', sans-serif;
            color: #294985;
            font-size: 28px;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }
        .content h2 {
            font-family: 'Raleway', sans-serif;
            color: #294985;
            font-size: 22px;
            font-weight: 600;
            margin-top: 0;
        }
        .content p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #1f1f1f;
        }
        .details-box {
            background-color: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
            margin: 30px 0;
            border-left: 5px solid #294985;
        }
        .details-box p {
            margin: 8px 0;
            font-size: 15px;
        }
        .details-box strong {
            color: #294985;
            width: 140px;
            display: inline-block;
        }
        .button-wrapper {
            text-align: center;
            margin-top: 40px;
        }
        .button {
            display: inline-block;
            padding: 18px 40px;
            background-color: #294985;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .footer {
            background-color: #ffffff;
            padding: 30px;
            text-align: center;
            font-size: 13px;
            color: #8b8b8b;
            border-top: 1px solid #d8d8d8;
        }
        @media only screen and (max-width: 600px) {
            .email-wrapper {
                padding: 0;
            }
            .email-container {
                width: 100% !important;
                border-radius: 0 !important;
            }
            .content {
                padding: 30px 20px !important;
            }
            .header {
                padding: 30px 20px !important;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <div class="header">
                <img src="<?php echo e(asset('front-assets/src/images/Time-matters-header-logo.webp')); ?>" alt="Time Matters Logo">
            </div>
            <div class="content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <div class="footer">
                &copy; <?php echo e(date('Y')); ?> Time Matters. All rights reserved.<br>
                This is an automated message, please do not reply directly to this email.
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/emails/layout.blade.php ENDPATH**/ ?>