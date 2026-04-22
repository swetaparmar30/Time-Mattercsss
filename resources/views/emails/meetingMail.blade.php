<!DOCTYPE html>
<html>

<head>
    <title>Time Master Garage Doors</title>
</head>

<body>
    <div class="container-fluid" style="background-color: #002855;">
        <div style="display: flex; justify-content: center;padding-top: 55px;">
            <div style="background-color: #e3e3e3;text-align: center;padding: 20px 0 0px 0;width:80%;margin: 0 auto;">
                <img src="{{asset('front-assets/src/images/time-matters-logo.png')}}" style="background:transparent;" width="200" height="auto">
            </div>
        </div>
    </div>
    <div style="display: flex; justify-content: center;">
        <div style="background-color: #e3e3e3;text-align: center;padding: 20px 0 20px 0;width:80%;margin: 0 auto;">
            <h5 style="color: #002855;font-size: 26px;font-weight: 700;padding: 0;margin: 0;">Congratulations</h5>
            <p>You have a new inquiry from your website</p>
        </div>
    </div>
    <div style="display: flex; justify-content: center;">
        <table width="100%" border="1" cellpadding="10px" cellspacing="0" style="text-align: left;width: 80%;border: 1px solid #f1f1f1;margin: 0 auto;">
            <tr>
                <td colspan="2"><label style="font-size: 15px;font-weight: 700;color: #000;margin:0 !important;">Name: </label> {{ isset($user_data['name']) ? $user_data['name'] : '-' }}</td>
            </tr>
            <tr>
                <td colspan="2"><label style="font-size: 15px;font-weight: 700;color: #000;margin:0 !important;">Email: </label> {{ isset($user_data['email']) ? $user_data['email'] : '-' }}</td>
            </tr>
            
            <tr>
                <td><label style="font-size: 15px;font-weight: 700;color: #000;margin:0 !important;">Phone Number: </label> {{ isset($user_data['phone']) ? $user_data['phone'] : '-' }}</td>
                <td><label style="font-size: 15px;font-weight: 700;color: #000;margin:0 !important;">Company Name: </label> {{ isset($user_data['company']) ? $user_data['company'] : '-' }}</td>
            </tr>
            <tr>
                <td colspan="2"><label style="font-size: 15px;font-weight: 700;color: #000;margin:0 !important;">Additional Info: </label> {{ isset($user_data['message']) ? $user_data['message'] : '-' }}</td>
            </tr>
            <tr>
                <td colspan="2"><label style="font-size: 15px;font-weight: 700;color: #000;margin:0 !important;">URL: </label> {{ isset($user_data['url']) ? $user_data['url'] : '-' }}</td>
            </tr>
        </table>
    </div>
    
    
 
    
</body>

</html>
