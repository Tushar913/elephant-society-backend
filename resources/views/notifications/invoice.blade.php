@component('mail::message')

<div align="right" style="margin-bottom:4px">{{$invoice->society->name}}</div>
<br>

# Hello {{ $invoice->owner->name }}!

Your invoice for the month {{ number_format(floatval($invoice->bill_month), 2) }} is generated.

Maintenance Cost: {{ number_format(floatval($invoice->maintainance_cost), 2) }}<br>
Water Charges: {{ number_format(floatval($invoice->water_charges), 2) }}<br>
Vehicle Charges: {{ number_format(floatval($invoice->vehicle_charges), 2) }}<br>
Other Charges ...

---

## Total Charges: {{ number_format(floatval($totalCharges), 2) }}

<div>Thank you for being a valued member of our society!</div><br>

<div>Thanks,</div>
<div>{{ config('app.name') }}</div>
@endcomponent
