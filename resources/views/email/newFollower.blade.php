@component('mail::message')
# Introduction

You have a new follower {{$followerName}}!

@component('mail::button', ['url' => 'http://fakegithub.test/followers'])
Check it out!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
