<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lampiran 1</title>
    {{-- <link rel="stylesheet" href="{{ asset('asset_cetak/css/lampiran1.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_cetak/css/lampiran2.css') }}" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link
      rel="stylesheet"
      href="{{ asset('asset_cetak/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}"
    /> --}}
    <style>
    @media dompdf {
        html, body { font-size: 80%; }
        .container-0 .left-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .container-0 .left-container .logo {
            text-align: right;
            margin-bottom: 10px;
        }

        .container-0 .left-container .logo img {
            width: 75px;
        }

        .container-0 .left-container .title {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .container-0 .left-container .title p {
            font-weight: bold;
            margin: 0;
        }

        .container-0 .left-container .title .uni {
            margin: 0;
            font-size: 14px;
            letter-spacing: .02rem;
        }

        .container-0 .left-container .title .vocation {
            font-size: 13px;
            margin: 0;
        }

        .container-0 .right-container p,
        .container-0 .right-container table td {
            font-size: 12px;
            margin: 0;
        }

        .container-1 .title {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            padding: 15px 0;
            margin: 0;
        }

        .container-2 {
            /* border: 2px red solid; */
        }

        .container-2 table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #000;
            table-layout: fixed;
        }

        .container-2 table td {
            border: 1px solid #000;
            font-size: 12px;
            padding: 3px;
            text-align: left;
            vertical-align: top;
        }

        .container-2 table td ol {
            transform: translateX(-20px);
        }

        .container-3 {
            /* border: 2px red solid; */
            font-size: 12px;
        }

        .container-3 .right-container td,
        .container-3 .right-container p {
            margin: 0;
            padding: 0;
        }
    }
    </style>

  </head>

  <body>
    @foreach ($surat->pegawai as $pegawai)
    <div class="container-fluid container-0">
      <div class="row d-flex justify-content-between">
        <div class="col-6 left-container">
          <div class="logo px-3">
            <img src="{{ asset('asset_cetak/img/logo-politani.png') }}" alt="" />
          </div>
          <div class="title">
            <p class="uni">POLITEKNIK PERTANIAN NEGERI SAMARINDA</p>
            <p class="vocation">
              KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br />
              DIREKTORAT PENDIDIKAN TINGI VOKASI
            </p>
          </div>
        </div>
        <div class="col-6 right-container">
          <p>Lampiran I</p>
          <p>PERATURAN MENTERI KEUANGAN REPUBLIK INDONESIA</p>
          <p>NOMOR: 113/PMK.05/2012</p>
          <p>TENTANG</p>
          <p>
            PERJALANAN DINAS JABATAN DALAM NEGERI BAGI PEJABAT NEGARA, PEGAWAI
            NEGERI, DAN PEGAWAI TIDAK TETAP
          </p>
          <table>
            <tr>
              <td style="padding-right: 20px">Lembar Ke</td>
              <td style="padding-right: 5px">:</td>
              <td>............................................</td>
            </tr>
            <tr>
              <td>Kode No.</td>
              <td>:</td>
              <td>............................................</td>
            </tr>
            <tr>
              <td>Nomor</td>
              <td>:</td>
              <td>{{ $surat->nomor_surat }}/PL21/SPPD/2024</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="container-fluid main-title container-1">
      <p class="title">SURAT PERINTAH PERJALANAN DINAS</p>
    </div>
    <div class="container-fluid container-2">
      <div class="row">
        <table>
          <tr>
            <td style="width: 25%">
              Pejabat Berwenang yang memberikan perintah
            </td>
            <td colspan="3" style="width: 25%">
              {{ $surat->pimpinan->name }}
            </td>
          </tr>
          <tr>
            <td>
              <p>Nama/NIP Pegawai yang diberi perintah</p>
            </td>
            <td colspan="3">
              <p class="my-0 py-0">{{ $pegawai->name }}</p>
              <p class="my-0 py-0">NIP. {{ $pegawai->nip }}</p>
            </td>
          </tr>
          <tr>
            <td>
              <p class="my-0 py-0">
                a. Pangkat dan golongan ruang gaji menurut
              </p>
              <p class="my-0 py-0">b. Jabatan/Instansi</p>
              <p class="my-0 py-0">
                c. Tingkat menurut peraturan perjalanan dinas
              </p>
            </td>
            <td colspan="3">
              <p class="my-0 py-0">a. {{ $pegawai->golongan }}</p>
              <p class="my-0 py-0">b. {{ $pegawai->jabatan }}</p>
              <p class="my-0 py-0">c. -</p>
            </td>
          </tr>
          <tr>
            <td>Maksud Perjalanan Dinas</td>
            <td colspan="3">{{ $surat->tujuan_perjalanan }}</td>
          </tr>
          <tr>
            <td>Angkutan yang digunakan</td>
            <td colspan="3">{{ $surat->angkutan }}</td>
          </tr>
          <tr>
            <td>
              <p class="my-0 py-0">a. Tempat berangkat</p>
              <p class="my-0 py-0">b. Tempat tujuan</p>
            </td>
            <td colspan="3">
              <p class="my-0 py-0">{{ $surat->tujuan_perjalanan }}</p>
              <p class="my-0 py-0">
                {{ $surat->tempat_tujuan }}
                {{-- <u>{{ $surat->tempat_tujuan }}</u> --}}
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p class="my-0 py-0">a. Lama perjalanan dinas</p>
              <p class="my-0 py-0">b. Tanggal berangkat</p>
              <p class="my-0 py-0">c. Tanggal harus kembali</p>
            </td>
            <td colspan="3">{{ $surat->lama_perjalanan }} (dua) hari {{ $surat->tanggal_berangkat }} - {{ $surat->tanggal_kembali }}</td>
          </tr>
          <tr>
            <td style="word-spacing: 100px">Pengikut Nama</td>
            <td class="text-center umur">Umur</td>
            <td colspan="2" class="text-center">
              Hubungan Keluarga/Keterangan
            </td>
          </tr>
          <tr>
            <td>
                {{-- @php
                $decodedNama = json_decode($surat->nama, true);
                $decodedUmur = json_decode($surat->umur, true);
                $decodedHubungan = json_decode($surat->hubungan, true);
            @endphp
                @for ($i = 1; $i <= 4; $i++)
                    <p class="my-0 py-0">{{ $i }}.
                        @if (isset($decodedNama) && is_array($decodedNama) && $i <= count($decodedNama))
                            {{ $decodedNama[$i - 1] }}
                        @endif
                    </p>
                @endfor --}}
                <p class="my-0 py-0">1. </p>
                <p class="my-0 py-0">2. </p>
                <p class="my-0 py-0">3. </p>
                <p class="my-0 py-0">4. </p>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <p class="my-0 py-0">Pembeban Anggaran</p>
              <p class="my-0 py-0">a. Instansi</p>
              <p class="my-0 py-0">b. Mata Anggaran</p>
            </td>
            <td colspan="3">
              <p></p>
              <p class="my-0 py-0">a. {{ $surat->instansi }}</p>
              <p class="my-0 py-0">b. {{ $surat->mata_anggaran }}</p>
            </td>
          </tr>
          <tr>
            <td>Keterangan lain-lain :</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="container-fluid mt-3 container-3" style="margin-bottom: 200px;">
      <div class="row d-flex justify-content-between">
        <div class="col-7 left-container">
          <p>*) Coret yang tidak perlu</p>
        </div>
        <div class="col-5 right-container">
          <table class="mb-3">
            <tr>
              <td>Dikeluarkan di</td>
              <td class="px-3">: Samarinda</td>
            </tr>
            <tr>
              <td>Pada tanggal</td>
              <td class="px-3">: 2 Februari 2024</td>
            </tr>
          </table>
          <p>Pejabat Pembuat Komitmen</p>
          <p>Politeknik Pertanian Negeri Samarinda</p>
          <p class="mt-5">{{ $surat->pimpinan->name }}</p>
          <p>NIP : {{ $surat->pimpinan->mip }}</p>
        </div>
      </div>
    </div>
    <div class="container-fluid container-0">
        <div class="row">
          <div class="col-6 offset-6">
            <table class="non-tabel">
              <!-- I -->
              <tr>
                <td>I.</td>
                <td>
                  <p class="my-0 py-0">Berangkat dari</p>
                  <p class="my-0 py-0">(Tempat Kedudukan)</p>
                  <p class="my-0 py-0">Ke</p>
                  <p class="my-0 py-0">Pada Tanggal</p>
                </td>
                <td>
                  <p class="my-0 py-0">: {{ $surat->tempat_berangkat }}</p>
                  <p class="my-0 py-0">:</p>
                  <p class="my-0 py-0">:</p>
                  <p class="my-0 py-0">:</p>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-4 offset-8 text-center">
            <p>Pimpinan,</p>
            <p>Politeknik Pertanian Negeri</p>
            <p>Samarinda</p>
            <p class="mt-5 my-0 py-0"><u>{{ $surat->pimpinan->name }}</u></p>
            <p class="my-0 py-0">NIP. {{ $surat->pimpinan->nip }}</p>
          </div>
        </div>
      </div>
      <div class="container-fluid container-1 mt-3">
        <div class="row">
          <table class="tabel">
            <!-- II -->
            <tr>
              <td>
                <table class="non-tabel left-content">
                  <tr>
                    <td>II.</td>
                    <td>
                      <p class="my-0 py-0">Tiba di</p>
                      <p class="my-0 py-0">Pada Tanggal</p>
                      <p class="my-0 py-0">Kepala</p>
                    </td>
                    <td>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p></p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td>
                      <p class="mt-3 my-0 py-0">NIP :</p>
                    </td>
                  </tr>
                </table>
              </td>
              <td>
                <table class="non-tabel right-content">
                  <tr>
                    <td>
                      <p class="my-0 py-0">Berangkat dari</p>
                      <p class="my-0 py-0">Ke</p>
                      <p class="my-0 py-0">Pada tanggal</p>
                      <p class="my-0 py-0">Kepala</p>
                    </td>
                    <td>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="1"></td>
                    <td>
                      <p class="mt-3 my-0 py-0">NIP :</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- III -->
            <tr>
              <td>
                <table class="non-tabel left-content">
                  <tr>
                    <td>III.</td>
                    <td>
                      <p class="my-0 py-0">Tiba di</p>
                      <p class="my-0 py-0">Pada Tanggal</p>
                      <p class="my-0 py-0">Kepala</p>
                    </td>
                    <td>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p></p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td>
                      <p class="mt-3 my-0 py-0">NIP :</p>
                    </td>
                  </tr>
                </table>
              </td>
              <td>
                <table class="non-tabel right-content">
                  <tr>
                    <td>
                      <p class="my-0 py-0">Berangkat dari</p>
                      <p class="my-0 py-0">Ke</p>
                      <p class="my-0 py-0">Pada tanggal</p>
                      <p class="my-0 py-0">Kepala</p>
                    </td>
                    <td>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="1"></td>
                    <td>
                      <p class="mt-3 my-0 py-0">NIP :</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- IV -->
            <tr>
              <td>
                <table class="non-tabel left-content">
                  <tr>
                    <td>IV.</td>
                    <td>
                      <p class="my-0 py-0">Tiba di</p>
                      <p class="my-0 py-0">Pada Tanggal</p>
                      <p class="my-0 py-0">Kepala</p>
                    </td>
                    <td>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p></p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td>
                      <p class="mt-3 my-0 py-0">NIP :</p>
                    </td>
                  </tr>
                </table>
              </td>
              <td>
                <table class="non-tabel right-content">
                  <tr>
                    <td>
                      <p class="my-0 py-0">Berangkat dari</p>
                      <p class="my-0 py-0">Ke</p>
                      <p class="my-0 py-0">Pada tanggal</p>
                      <p class="my-0 py-0">Kepala</p>
                    </td>
                    <td>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="1"></td>
                    <td>
                      <p class="mt-3 my-0 py-0">NIP :</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- V & VI -->
            <tr>
              <td>
                <table class="non-tabel left-content mb-1">
                  <tr>
                    <td>V.</td>
                    <td>
                      <p class="my-0 py-0">Tiba di</p>
                      <p class="my-0 py-0">Pada Tanggal</p>
                    </td>
                    <td>
                      <p class="my-0 py-0">:</p>
                      <p class="my-0 py-0">:</p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td>
                      <p class="mt-4 my-5 py-0">Pejabat Pembuat Komitmen</p>
                      <p class="my-0 py-0">
                        <u>{{ $surat->pimpinan->name }}</u>
                      </p>
                      <p class="mb-3 my-0 py-0">NIP : {{ $surat->pimpinan->nip }}</p>
                    </td>
                  </tr>
                  <tr>
                    <td>VI.</td>
                    <td>Lain-lain</td>
                    <td>:</td>
                  </tr>
                </table>
              </td>
              <td>
                <table class="non-tabel right-content">
                  <tr>
                    <td class="text-v">
                      Telah diperiksa dengan keterangan bahwa perjalanan tersebut
                      di atas benar dilakukan atas perintahya dan semata-mata
                      untuk Kepentingan jabatan dalam waktu yang
                      sesingkat-singkatnya.
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <p class="mt-3 my-5 py-0">Pejabat Pembuat Komitmen</p>
                      <p class="my-0 py-0">
                        <u>{{ $surat->pimpinan->name }}</u>
                      </p>
                      <p class="my-0 py-0">NIP : {{ $surat->pimpinan->nip }}</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="container-fluid container-2 px-0 mt-3" style="margin-bottom: 100px;">
        <table class="tabel">
          <tr>
            <td>VII.</td>
            <td>Perhatian :</td>
          </tr>
          <tr>
            <td></td>
            <td>
              Pejabat yang berwenang menerbitkan SPPD, pegawai yang melakukan
              perjalanan dinas, para pejabat yang mengesahkan <br />
              Tanggal berangkat/tiba serta bendaharawan bertanggungjawab
              berdasarkan peraturan-peraturan keuangan Negara apabila <br />
              menderita rugi akibat kesalahan, kelalian dan kealfaannya.
            </td>
          </tr>
        </table>
      </div>
    @endforeach
    {{-- <script src="{{ asset('asset_cetak/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        // window.print();
    </script>
  </body>
</html>
