<html>

<head>
    <title>DAILY PATIENT</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    * {
        font-size: 15px;
        font-family: sans-serif;
        font-weight: normal;
        line-height: 20px;
    }

    @page {
        size: letter;
    }
    </style>
</head>

<body>
        <div>
            <h4>MERITA DIAGNOSTIC CLINIC INC.</h4>
            <h5 style="margin-top: 2rem;">DATA PRIVACY CONSENT</h5>
            <p style="margin-top: 1rem;">In compliance with the Data Privacy Act (DPA) of 2012, and its Implementing Rules and Regulations (IRR) 
                effective since September 8, 2016, I allow The Merita Diagnostic Clinic Inc. to process my data for overseas employment compliance.</p>
            <p style="margin-top: 1rem;">As such, I agree and authorize Merita Diagnostic Clinic Inc. to:</p>
            <div class="container">
                <ol>
                    <li>Continue to use my data and my policies' information to process my medical as stated in my policy (ies).</li>
                    <li>Retain my information for a period of five (5) years from the date of termination of my policy, or at such time that I submit to Merita Diagnostic Clinic Inc.,
                         a written cancellation of this consent, whichever is earlier. 
                        I agree that my information will be deleted / destroyed after this period.</li>
                    <li>Retain my data in the Medical Information Database shared with other diagnostic clinics if necessary in accordance with the Data Privacy Act Regulations.</li>
                    <li>Share my information to affiliates and necessary third parties for any legitimate medical purpose or transmit data to other countries for the compliance of its own with the request of their employer. I am assured that security systems are employed to protect my information.</li>
                    <li>Inform me of future customer campaigns and base its offer using the personal information I shared with the company. 
                        I also acknowledge and warrant that I have acquired the consent from all parties relevant to this consent 
                        and hold free and harmless and indemnify Merita Diagnostic Clinic Inc. 
                        from any complaint, suit, or damages which any party may file or claim in relation to my consent.</li>
                </ol> 
            </div>
            <p>I have read and understand the information provided in this Patient Data Protection Consent for Merita Diagnostic Clinic Inc., 
                have had any questions about it answered, and hereby voluntarily provide my express consent to the collection, use, processing, transfer, disclosure and Personal Data
                 (including medical information and sensitive data) as described in this Patient Data Protection Consent for Merita Diagnostic Clinic Inc.</p>
        </div>

        <div style="margin-top: 3rem;display: flex;align-items: flex-start; justify-content: space-around;">
            <div style="width: 40%;">
                <div style="width: 100%;">
                    <div style="border-bottom: 1px solid black; text-align: center;">{{$patient->firstname}} {{$patient->middlename[0]}}. {{$patient->lastname}}</div>
                    <div style="text-align: center;"><b>PATIENT NAME</b></div>
                </div>
                <div  style="margin-top: 1rem; width: 100%;">
                    @if($patient->patient_signature)
                    <img style="object-fit: cover;display: block; margin-left: auto; margin-right: auto; width: 50%;" src="@php echo base64_decode($patient->patient_signature) @endphp" width="150px" />
                    @elseif ($patient->signature)
                        <img style="object-fit: cover;" src="data:image/jpeg;base64,{{$patient->signature}}" width="150px"/>
                    @else 
                        <div style="width: 90%;height: 40px;"></div>
                    @endif 
                    <div style="text-align: center; border-top: 1px solid black;"><b>PATIENT SIGNATURE</b></div>
                </div>
            </div>
            <div style="width: 40%;">
                <div style="border-bottom: 1px solid black; text-align: center;">{{date('F d, Y')}}</div>
                <div style="text-align: center;"><b>DATE</b></div>
            </div>
        </div>


</body>