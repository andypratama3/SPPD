<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lampiran 1</title>
    <link rel="stylesheet" href="{{ asset('asset_cetak/css/lampiran-1.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_cetak/css/lampiran-2.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="{{ asset('asset_cetak/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}"
    />

    <style>
         @media print{
            @page {
                margin-top: 30px;
                margin-bottom: 30px;
            }
            }
    </style>
  </head>

  <body>
    @foreach ($surat->pegawai as $pegawai)
    @foreach ($surat->rincianBiaya as $rincian)

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
              @foreach ($nomor_surat as $no)
                <td>{{ $surat->nomor_surat }}{{ $no->nomor_surat }}</td>
              @endforeach
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="container-fluid main-title lampiran-1 container-1">
      <p class="title">SURAT PERINTAH PERJALANAN DINAS</p>
    </div>
    <div class="container-fluid lampiran-1 container-2">
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
            <td colspan="3">
              <p class="my-0 py-0">{{ $surat->lama_perjalanan }} ({!! \Illuminate\Support\Str::words($surat->lama_perjalanan,5) !!}) hari</p>
              <p class="my-0 py-0">{{ $tgl_berangkat_formated }}</p>
              <p class="my-0 py-0">{{ $tgl_kembali_formated }}</p>
            </td>
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
    <div class="container-fluid mt-3 lampiran-1 container-3" style="margin-bottom: 200px;">
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
              {{-- <td class="px-3">: {{ $tanggal_hari_ini_formated }}</td> --}}
            </tr>
          </table>
          <p>Pejabat Pembuat Komitmen</p>
          <p>Politeknik Pertanian Negeri Samarinda</p>
          <p class="mt-5">{{ $surat->pimpinan->name }}</p>
          <p>NIP : {{ $surat->pimpinan->nip }}</p>
        </div>
      </div>
    </div>

    {{-- rincian Biaya --}}
    <div class="container-fluid container-0">
        <div class="row">
          <p class="text-center title">RINCIAN BIAYA PERJALANAN DINAS</p>
          <div class="col-12">
            <table class="tabel">
              <tr>
                <td>Lampiran SPPD Nomor</td>
                <td class="d-dot">:</td>
                @foreach ($nomor_surat as $nomor)
                    <td class="d-dot">{{ $surat->nomor_surat }} {{ $nomor->nomor_surat }}</td>
                @endforeach
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
      <div class="container-fluid container-1" style="margin-bottom: 320px;">
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
              @php
                $decodedRincian = json_decode($rincian['rincian'], true);
                $decodedJumlah = json_decode($rincian['jumlah'], true);
                $decodedRp = json_decode($rincian['rp'], true);
                $decodedTotal = json_decode($rincian['total'], true);
                $decodedKeterangan = json_decode($rincian['keterangan'], true);
              @endphp
              @foreach ($decodedRincian as $key => $item_rincian)
              <tr class="non-tp-border">
                <td class="text-center my-0 py-0">{{ $loop->iteration }}</td>
                <td class="my-0 py-0">{{ $item_rincian }}</td>
                <td class="d-flex justify-content-between amount">
                  <span>Rp.</span> 500.000
                </td>
                <td>{{ $decodedKeterangan[$key] }}</td>
              </tr>
              <tr class="non-tp-border">
                <td class="text-center my-0 py-0 pt-1" style="vertical-align: top">2.</td>
                <td class="my-0 py-0">
                  {{ $item_rincian }}
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
              @endforeach

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
                  <p class="my-0 py-0"><span class="rp">Rp.</span>{{ $rincian->dp }}</p>
                </td>
                <td colspan="2">
                  <p class="my-0 py-0">Telah terima jumlah uang sebesar</p>
                  <p class="my-0 py-0"><span class="rp">Rp.</span>{{ $rincian->dp }}</p>
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
                  @foreach ($rincian->pegawaiRincian as $pegawai_rincian)
                    <p class="my-0 py-0">{{ $pegawai_rincian->name }}</p>
                    <p class="mb-3 my-0 py-0">{{ $pegawai_rincian->nip }}</p>
                  @endforeach
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
      <div class="container-fluid lampiran-2 container-2 px-0 mt-3" style="margin-bottom: 100px;">
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
    @endforeach

    <script src="{{ asset('asset_cetak/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>

    </script>
  </body>
</html>
