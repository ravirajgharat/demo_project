@component('mail::message')
<h2>Reply to Your Query</h2>
@component('mail::panel')
<h3>Your Query</h3>
<p>{{ $query->query }}</p>
@endcomponent
<p>{{ $query->reply }}</p>