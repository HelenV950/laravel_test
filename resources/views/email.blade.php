@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => '', 'color'=>'green'])
Button Text
@endcomponent

@component('mail::panel')
panel Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
