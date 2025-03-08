<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi QR CODE</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3 text-center justify-content-center">
            <div class="alert"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                    <select class="form-select form-select-lg" name="mata_pelajaran" id="mata_pelajaran">
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach ($matapelajaran as $mapel)
                            <option value="{{ $mapel->id }}">{{ $mapel->kode }} | {{ $mapel->nama }}</option>
                        @endforeach
                    </select>
                </div>


                <div id="reader" width="300px"></div>

            </div>
            <div class="col-md-6 col-sm-12">
                <div class="table-presensi"></div>
            </div>
        </div>

    </div>



    <script>
        function onScanSuccess(decodedText, decodedResult) {

            let matapelajaran = $("#mata_pelajaran").val();
            let guru = $("#guru").val();

            if (matapelajaran === "") {
                $(".alert").html(`<p class="alert alert-danger"> Mata Pelajaran Belum Diisi </p>`);
            } else {
                $(".alert").html("");
                $.ajax({
                    type: "POST",
                    url: "/ajax_proses_presensi_qr_code",
                    data: {
                        _token: "{{ csrf_token() }}",
                        matapelajaran_id: matapelajaran,
                        qr_code: decodedText
                    },
                    success: function(response) {
                        if (response.status === true) {
                            $(".table-presensi").html(response.html);
                            let utterance = new SpeechSynthesisUtterance(response.message);
                            utterance.lang = "id-ID"; // Bahasa Indonesia
                            speechSynthesis.speak(utterance); // Memutar suara
                        } else {
                            $(".alert").html(`<p class="alert alert-danger">${response.message}</p>`);
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            // Ambil errors dari response JSON
                            let errors = xhr.responseJSON.errors;

                            // Reset alert message terlebih dahulu
                            $(".alert").html('');

                            // Loop untuk setiap field error dan tampilkan di alert
                            for (let field in errors) {
                                // Tampilkan pesan error untuk setiap field yang gagal validasi
                                $(".alert").append(
                                    `<span class="alert alert-danger">${errors[field].join(', ')}</span><br>`
                                );
                            }
                            console.error('Validasi error:', errors);
                        } else {
                            console.error(xhr, status, error);
                        }
                    }
                });
            }

        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 0.2, // Set kecepatan pemindaian menjadi sangat lambat (0.5 frame per second)
                qrbox: {
                    width: 200, // Ukuran kotak pemindaian QR code
                    height: 200
                },
                experimentalFeatures: {
                    useBarCodeDetectorIfSupported: true // Gunakan Barcode Detector jika didukung
                },
                rememberLastUsedCamera: true, // Ingat kamera terakhir yang digunakan
                supportedScanTypes: [
                    Html5QrcodeScanType.SCAN_TYPE_CAMERA // Hanya mendukung pemindaian menggunakan kamera
                ],
                aspectRatio: 1.7777778, // Aspect ratio untuk tampilan pemindaian
                facingMode: "environment"
            });
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
