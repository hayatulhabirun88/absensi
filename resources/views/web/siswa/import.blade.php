@extends('web.template.content')

@section('title', 'Siswa')

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Import DAta</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('import_data') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file_siswa" class="form-label">File Data Siswa</label>
                            <input type="file" class="form-control" name="file_siswa" id="file_siswa"
                                placeholder="Pilih File" aria-describedby="fileHelpId" />
                        </div>

                        <input type="submit" class="btn btn-info" value="Import Data Siswa">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

@push('script')
    <!-- JS Libraies -->
    <script src="{{ asset('') }}otika/assets/bundles/sweetalert/sweetalert.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('') }}otika/assets/js/page/sweetalert.js"></script>

    <script>
        $(document).ready(function() {

            $('#searchInput').keypress(function(e) {
                // Check if the key pressed is Enter (keyCode 13)
                if (e.which == 13) {
                    e.preventDefault(); // Prevent the default action (form submission)
                    $('#searchForm').submit(); // Submit the form
                }
            });


            $(".hapus-siswa-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var siswa = $(this).data('nama-sws');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus Siswa ' + siswa + ' !',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $("#" + formId).submit();
                    }
                });
            });

        });
    </script>
@endpush
