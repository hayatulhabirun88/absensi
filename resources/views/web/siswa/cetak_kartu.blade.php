<!DOCTYPE html>
<html>

<head>
    <title>Cetak Kartu Barcode</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            padding: 20px;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .kartu {
            width: 250px;
            /* Ukuran kartu yang lebih besar untuk penampilan lebih baik */
            height: 350px;
            /* Sesuaikan dengan ukuran kartu Anda */
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 10px;
            box-sizing: border-box;
            transition: transform 0.3s ease;
        }

        .kartu:hover {
            transform: scale(1.05);
        }

        .data-kartu {
            font-size: 14px;
            color: #333;
        }

        .data-kartu p {
            margin: 5px 0;
        }

        .data-kartu p strong {
            color: #0056b3;
        }

        .barcode-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .qrcode {
            margin-top: 20px;
        }

        .barcode {
            width: 150px;
            height: 150px;
            margin: 0 auto;
        }

        /* Pemberian space untuk cetak lebih rapi */
        .print-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    @foreach ($siswa as $sis)
        <div class="kartu">
            <div class="data-kartu">
                <p><strong>Nama:</strong> {{ $sis->nama }}</p>
                <p><strong>Kelas:</strong> {{ $sis->kelas->nama_kelas }} {{ $sis->kelas->program }}
                    {{ $sis->kelas->jurusan }}</p>
                <!-- Data lain bisa ditambahkan di sini -->
            </div>

            <!-- Barcode Dinamis -->
            <div id="qrcode_{{ $sis->id }}" class="barcode-container"></div>
        </div>

        <script>
            var qrcode = new QRCode(document.getElementById("qrcode_{{ $sis->id }}"), {
                text: "{{ $sis->id }}",
                width: 150, // Ukuran QR Code yang lebih besar
                height: 150,
            });
        </script>
    @endforeach

</body>

</html>
