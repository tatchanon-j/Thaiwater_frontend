<?php
return [
    'user_name' => 'Email',
    'password' => 'Password',
	'password_old' => 'Old password',
	'password_new' => 'New password',
	'password_new_retype' => 'Confirm password',
    'login' => 'Login',
    'forgot_password' => 'Fogot password',
    'password_retype' => 'Confirm password',
    'setnewpassword' => 'Set you password',

    'E001' => 'An internal system error has occurred. Please contact the administrator.',
    'E002' => 'ชThe user or password is invalid.',
    'E003' => 'Username is canceled or expired. Please contact the administrator. By phone number below.',
    'E004' => 'Username can not be used on websites.้',
    'E005' => 'Your IP address is temporarily blocked. Due to logon attempts over %d, you can log in again within %d munute',
    'E006' => 'Your account has been temporarily blocked. Since you tried to log in more than %d times, you can log in again within. %d munute',
    'E007' => 'Username is not available for this site.',
    'E008' => 'Your password has expired. Please change your password. Before use again',
    'E009' => 'The login password for the robot is invalid or unverified.้',
    'E010' => 'Username or password is not encrypted when sending data.',
	'E011' => 'The new password reset request is invalid. Or has been used already.',
	'E012' => 'You need to re-login because the host name was changed. Please update your bookmark to prevent this error.',

    'err_resetpassword_noemail' => 'Please enter an email.',
    'err_resetpassword_nodata' => 'Please enter an email and indicate that you are not an automated program.',
    'err_resetpassword_norecapchar' => 'Please specify that you are not. Automatic program',
	'err_login_nopassword' => 'Please enter your code.',
    'err_login_nonewpassword' => 'Please enter your new password.',
    'resetpassword_success' => 'An email has been sent to reset your password. Please check your email.',
    'err_password_notmatch' => 'Password and password do not match.',
    'err_old_password_null' => 'Please enter your old password.',
	'err_toomany_resetpassword' => 'You changed your password too often. Please wait 3 minutes to complete this transaction again.',
	'err_email_notfound' => 'This email is not registered on the system.',
	'err_notalocalaccount' => 'User can not reset password. Please proceed to LDAP source system.'
];
