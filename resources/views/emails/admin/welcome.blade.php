@component('mail::message')
<h1>Welcome to My Shopping Cart</h1>
<p>To log in when visiting our site just click <a href="http://localhost/demo_project/public">Login</a> at the top of every page, and then enter your email address and password.</p>
@component('mail::panel')
Use the following values when prompted to log in:<br>
Email: {{ $user->email }}<br>
@endcomponent
When you log in to your account, you will be able to do the following:<br>
<ul>
<li>Proceed through checkout faster when making a purchase</li>
<li>Check the status of orders</li>
<li>View past orders</li>
<li>Make changes to your account information</li>
<li>Change your password</li>
<li>Store alternative addresses (for shipping to multiple family members and friends!)</li>
</ul>
If you have any questions, please feel free to contact us atinfo@shoppingcompany.com or by phone at+91 –22 -40500699.
Thanks,<br>
{{ config('app.name') }}
@endcomponent