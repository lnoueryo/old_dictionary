@component('mail::message')
# Activation Email

The body of your message.

{{ $user->token_activation }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
