<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: monospace;
            font-size: 10pt;
            padding: 10px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <strong>Toko Sesy Berkah</strong><br>
        Jl. Simpang Remujung No.3 Malang<br>
        -------------------------------<br>
        Selamat datang dan selamat berbelanja <br>
        -------------------------------
    </div>

    <p>
        <strong>Kode:</strong> {{ $penjualan->penjualan_kode }}<br>
        <strong>Pembeli:</strong> {{ $penjualan->pembeli }}<br>
        <strong>Tanggal:</strong> {{ $penjualan->penjualan_tanggal }}<br>
        <strong>Kasir:</strong> {{ $penjualan->user->nama }}
    </p>

    <div class="line"></div>

    <table>
        @php $total = 0; @endphp
        @foreach ($penjualan->detail as $d)
                @php
                    $subtotal = $d->harga * $d->jumlah;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td colspan="2">{{ $d->barang->barang_nama }}</td>
                </tr>
                <tr>
                    <td>{{ $d->jumlah }} x {{ number_format($d->harga, 0, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
        @endforeach
    </table>

    <div class="line"></div>

    <p class="text-right"><strong>Total: Rp {{ number_format($total, 0, ',', '.') }}</strong></p>

    <div class="text-center">
        -------------------------------<br>
        Terima kasih <br>
        Selamat datang kembali <br>
        -------------------------------
    </div>
</body>

</html>