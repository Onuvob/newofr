@component('mail::message')
# Greetings from the Office of Faculty Research
Dear Venerable {{ $data['firstName'] }} {{ $data['lastName'] }} <br>
Your applied claim type "{{ $data['claimType'] }}"" with an ID "{{ $data['claimId'] }}"" have been accepted. You have claimed "{{ $data['rewardPoints'] }}" Reward Points and  "{{ $data['cashRewards'] }}" Cash Rewards.

Thanks,<br>
{{ config('app.name') }}
@endcomponent