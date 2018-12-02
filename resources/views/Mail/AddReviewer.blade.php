@component('mail::message')
# Greetings from the Office of Faculty Research

Venerable Professor Haque,<br><br>


As a highly regarded expert, I am seeking your kind support by assessing the attached research intent that has been submitted for the <strong>ULAB Faculty Research Grant 2018</strong>. The <b>"Introduction & Research Background"</b> of the intent is <i>"{{ $data['intro_back'] }}".</i><br><br>

This 2-page long intent highlights a brief introduction of the proposed research project and its methodology. Moreover, the intent also contains lists of seminal works and expected scholarly outcomes of the research. Since this is a single-blind-peer-review process, I am also attaching the CVs of the investigator(s) with the intent.<br><br>

We sincerely value your time, hence we have prepared a Likert-based Evaluation Form (attached herewith) and requesting you to use it for your assessment. Moreover, if needed, you can also give additional comments regarding the intent in the form.<br><br>

 

You are also requested to return the filled evaluation form in a reply to this email <span style=" color: #ff0000;">within next 7 days</span>. Please note that this quick turnaround is to establish a research-friendly environment at the university.<br><br>


On behalf of the Office of Faculty Research, we appreciate your voluntary contribution and thank you for your kind support. It is worthwhile to add that the evaluation process will be confidential.<br><br>


If you have any query or feedback, please feel free to contact us.<br><br>

As always, we value any feedback you may have.<br><br>



@component('mail::button', [ 'type' => 'submit', 'url' => 'http://localhost:8000/acceptreport/'. $data['res_id'] ])
Accept
@endcomponent

			

Thanks,<br>
{{ config('app.name') }}
@endcomponent
