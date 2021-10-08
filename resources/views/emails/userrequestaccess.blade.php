@component('mail::message')
# Notification for user requests

User is requesting access to IBU SDP. Please login and check user status page. 
**IBU SDP**

@component('mail::button', ['url' => ''])
Go to Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
