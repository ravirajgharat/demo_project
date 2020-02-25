@component('mail::message')
<h3>Dear Administrator,</h3><br>
<p>Please check below details of customer.</p><br>
@component('mail::table')
|                           |                                               |
| ------------------------- |:---------------------------------------------:|
| Name                      | {{ $query->firstname }} {{ $query->lastname }}|
| Email                     | {{ $query->email }}                           |
| Contact No.               | {{ $query->contact }}                         |
| Comment                   | {{ $query->query }}                           |
@endcomponent
@endcomponent
