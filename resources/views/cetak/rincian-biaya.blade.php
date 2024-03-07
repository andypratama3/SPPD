<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rincian Biaya Perjalanan Dinas</title>
    <link rel="stylesheet" href="{{ asset('asset_cetak/css/rincian-biaya.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('asset_cetak/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}"
    />
  </head>

  <body>
    <div class="container-fluid container-0">
      <div class="row">
        <p class="text-center title">RINCIAN BIAYA PERJALANAN DINAS</p>
        <div class="col-12">
          <table class="tabel">
            <tr>
              <td>Lampiran SPPD Nomor</td>
              <td class="d-dot">:</td>
              <td>291/PL21/SPPD/2024</td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td class="d-dot">:</td>
              <td>7 Februari 2024</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="container-fluid container-1">
      <div class="row">
        <table class="tabel">
          <thead class="text-center">
            <tr>
              <th width="4%">NO.</th>
              <th>PERINCIAN BIAYA</th>
              <th width="15%">JUMLAH</th>
              <th>KETERANGAN</th>
            </tr>
          </thead>
          <tbody>
            <tr class="non-tp-border">
              <td class="text-center my-0 py-0">1.</td>
              <td class="my-0 py-0">Uang Transport Pegawai</td>
              <td class="d-flex justify-content-between amount">
                <span>Rp.</span> 500.000
              </td>
              <td>Transport Darat Samarinda - Balikpapan (PP)</td>
            </tr>
            <tr class="non-tp-border">
              <td class="text-center my-0 py-0 pt-1" style="vertical-align: top">2.</td>
              <td class="my-0 py-0">
                Uang Harian
                <div class="d-flex justify-content-center">
                  <table class="tabel-rincian" width="100%">
                    <tr class="non-rl-border">
                      <td class="text-end">2 ( dua ) hari</td>
                      <td class="text-center w-25">X Rp.</td>
                      <td class="text-start">35.000.000</td>
                    </tr>
                  </table>
                </div>
              </td>
              <td class="d-flex align-items-end justify-content-between amount pb-1">
                <span>Rp.</span> 700.000
              </td>
              <td class="info"></td>
            </tr>
            <tr class="non-tp-border">
              <td class="text-center my-0 py-0 pt-1" style="vertical-align: top">3.</td>
              <td class="my-0 py-0">
                Uang Penginapan
                <div class="d-flex justify-content-center align-items-end">
                  <table class="tabel-rincian" width="100%">
                    <tr class="non-rl-border">
                      <td class="text-end">1 ( satu ) hari</td>
                      <td class="text-center w-25">X Rp.</td>
                      <td class="text-start">5.254.000</td>
                    </tr>
                  </table>
                </div>
              </td>
              <td class="d-flex align-items-end justify-content-between amount pb-1">
                <span>Rp.</span> 525.408
              </td>
              <td class="info"></td>
            </tr>
            <tr class="non-tp-border">
              <td class="my-0 py-0 total-amount"></td>
              <td class="my-0 py-0 total-amount">JUMLAH</td>
              <td class="d-flex justify-content-between amount">
                <span>Rp.</span> 1.725.408
              </td>
              <td></td>
            </tr>
            <tr>
              <td colspan="4" style="border: 1px solid #000">
                Terbilang : Satu juta tujuh ratus dua puluh lima ribu empat
                ratus delapan rupiah
              </td>
            </tr>
            <tr class="non-border">
              <td colspan="2"></td>
              <td colspan="2">
                <p class="mt-3 my-0 py-0">Samarinda, 21 Februari 2024</p>
              </td>
            </tr>
            <tr class="non-border">
              <td></td>
              <td>
                <p class="my-0 py-0">Telah dibayar sejumlah</p>
                <p class="my-0 py-0"><span class="rp">Rp.</span>1.725.408</p>
              </td>
              <td colspan="2">
                <p class="my-0 py-0">Telah terima jumlah uang sebesar</p>
                <p class="my-0 py-0"><span class="rp">Rp.</span>1.725.408</p>
              </td>
            </tr>
            <tr class="non-border">
              <td></td>
              <td>
                <p class="mt-3 my-5 py-0">Bendahara Pengeluaran</p>
                <p class="my-0 py-0">Muliah, SE</p>
                <p class="mb-3 my-0 py-0">NIP 19771003 199903 2 001</p>
              </td>
              <td colspan="2">
                <p class="mt-3 my-5 py-0">Yang Menerima</p>
                <p class="my-0 py-0">Haryo Wicaksono, S.T</p>
                <p class="mb-3 my-0 py-0">NIP 19960206 201903 1 006</p>
              </td>
            </tr>
            <tr>
              <td
                colspan="4"
                class="text-center py-3"
                style="border-bottom: transparent"
              >
                PERHITUNGAN SPPD RAMPUNG
              </td>
            </tr>
            <tr class="non-border">
              <td></td>
              <td>
                <p class="py-0 my-0">Ditetapkan sejumlah</p>
                <p class="py-0 my-0">Yang telah dibayar semula</p>
                <p class="py-0 my-0">Sisa kurang lebih</p>
              </td>
              <td colspan="2">
                <p class="py-0 my-0">: <span class="rp">Rp.</span>1.725.408</p>
                <p class="py-0 my-0">: <span class="rp">Rp.</span>1.725.408</p>
                <p class="py-0 my-0">: <span class="rp">Rp.</span>-</p>
              </td>
            </tr>
            <tr class="non-border">
              <td colspan="2"></td>
              <td colspan="2">
                <p class="mt-3 my-5 py-0">Pejabat Pembuat Komitmen</p>
                <p class="my-0 py-0">Eva Nurmarini, S.Hut., MP</p>
                <p class="mb-3 my-0 py-0">NIP 19750808 199903 2 002</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <script src="{{ asset('asset_cetak/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
