@component('mail::message')
<img src="https://kslbd.net/assets/ksl-logo.svg" class="logo" alt="Laravel Logo" style="margin-bottom: 20px;">
<div class="fs-6" style="text-align: left">
    <h3 class="my-4">KSL Partner With Us</h3>
    <b>Name:</b> {{ $name }}<br>
    <b>Email:</b> {{ $email }}<br>
    <b>Reason:</b> {{ $reason }}<br>
    <b>Phone Number:</b> {{ $phoneNumber }}<br>
    <b>Division:</b> {{ $division->name }}<br>
    <b>District:</b> {{ $district->name }}<br>
    <b>Upazila:</b> {{ $upazila->name }}<br>
    <b>Union:</b> {{ $union->name }}<br>
</div>


@component('mail::button', ['url' => 'https://kslbd.net'])
Visit our website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
