<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    {{-- <span>Hi there, your recent order on history report has been completed.</span>
    <p>Your report has been sent to your email, please check your spam folder just in case the email got delivered there instead of your inbox.</p>
    <p>You can access the report through the link below :</p>
    {{ $details['link'] }}<br>
    <p>Ans we also attach your report here, if you are having trouble opening the link.</p>
    <br>
    <span>If you have any question, you can reply this message to get in touch with us.</span> --}}
    <h4>Dear customer,</h4>
    {{-- <p>Thanks for your order, a copy of your report is attached. You may also view the report through the <a href="{{ $details['link'] }}" target="_blank"></a> :</p> --}}
    <p>Thanks for your order, a copy of your report is attached. You may also view the report online <a href="{{ $details['link'] }}" target="_blank">{{ $details['link'] }}</a>.</p>
    {{-- {{ $details['link'] }}<br> --}}

    <?php
        // if ($details['is_user']) {
    ?>
            <p>You can login to your dashboard <a href="{{ $details['url_login'] }}" target="_blank">here</a> with your username below.</p>
            <p><b>Username : </b>{{ $details['username'] }}</p>
            <p><b>Password : </b>{{ $details['password'] }}</p>
    <?php
        // }
    ?>
    
    
    <span>If you have any question or the item its not as described, please get in touch with us by replying this message.</span>
</body>
</html>