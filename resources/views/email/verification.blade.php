<!DOCTYPE html>
<html>

<head>
    <title>Verify Your Email Address</title>
</head>

<body>
    <p>Hi {{ $user->name }},</p>
    <p>Please click the button below to verify your email address.</p>

    <a href="{{ route('verification.verify', ['id' => $user->id, 'hash' => Hash::make($user->email)]) }}">
        Verify Email Address
    </a>

    <p>Thanks,</p>
    <p>Your Team</p>
</body>

</html>
