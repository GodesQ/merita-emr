<div role="tabpanel" class="tab-pane false" id="account-referral" aria-labelledby="account-pill-referral"
    aria-expanded="false">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">Edit Referral Slip</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                @if ($referral)
                    @include('Referral.ReferralForms.edit-form')
                @else
                    <div class="h4 text-center">No Referral Slip Found</div>
                @endif
            </div>
        </div>
    </div>
</div>
