<div class="tab-pane fade" id="account-print-panel" role="tabpanel" aria-labelledby="account-pill-print-panel"
    aria-expanded="false">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <div class="card-title">
                        <h3>Uploaded Files</h3>
                    </div>
                </div>
                <div class="col-md-5">
                    @foreach ($errors->all() as $error)
                        @push('scripts')
                            <script>
                                let toaster = toastr.error('{{ $error }}', 'Error');
                            </script>
                        @endpush
                    @endforeach
                    <form action="/store_patient_files" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                <input type="file" class="form-control" id="upload_files" name="upload_files[]"
                                    multiple />
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-solid btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($patient_upload_files)
                    @foreach ($patient_upload_files as $patient_upload_file)
                        @if (pathinfo($patient_upload_file->file_name, PATHINFO_EXTENSION) == 'pdf')
                            <div class="col-md-2">
                                <div class="upload-con">
                                    <img src="../../../app-assets/images/pdf.png" alt="">
                                    <div class="upload-btn-div">
                                        <button type="button"
                                            onclick="window.open('/app-assets/files/{{ $patient_upload_file->file_name }}')"
                                            class="btn-print">View</button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-2">
                                <div class="upload-con">
                                    <img src="../../../app-assets/files/{{ $patient_upload_file->file_name }}"
                                        alt="">
                                    <div class="upload-btn-div">
                                        <button type="button"
                                            onclick="window.open('/app-assets/files/{{ $patient_upload_file->file_name }}')"
                                            class="btn-print">View</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4><b>CERTIFICATES</b></h4>
            <div class="row container my-1">
                <div class="col-lg-4 col-xl-3 col-sm-6 ">
                    <div class="print-con">
                        <img src="../../../app-assets/images/gallery/mlc.png" alt="">
                        <div class="print-btn-div">
                            <button type="button"
                                onclick="window.open('/mlc_print?id={{ $admissionPatient->id }}','wp','width=1000,height=800').print();"
                                class="btn-print">Print MLC</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-sm-6 ">
                    <div class="print-con">
                        <img src="../../../app-assets/images/gallery/bahia.png" alt="">
                        <div class="print-btn-div">
                            <button type="button"
                                onclick="window.open('/peme_bahia_print?id={{ $admissionPatient->id }}','wp','width=1000,height=800').print();"
                                class="btn-print">Print PEME BAHIA</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-sm-6 ">
                    <div class="print-con">
                        <img src="../../../app-assets/images/gallery/mer.png" alt="">
                        <div class="print-btn-div">
                            <button type="button"
                                onclick="window.open('/mer_print?id={{ $admissionPatient->id }}','wp','width=1000,height=800').print();"
                                class="btn-print">Print MER</button>
                        </div>
                    </div>
                </div>
            </div>
            <h4><b>MEDICAL CERTIFICATE</b></h4>
            @include('PrintPanel.print-panel')
        </div>
    </div>
</div>