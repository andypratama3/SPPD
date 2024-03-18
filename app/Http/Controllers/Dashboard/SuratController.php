<?php

namespace App\Http\Controllers\Dashboard;

use Dompdf\Dompdf;
use App\Models\Sbm;
use Dompdf\Options;
use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Pimpinan;
use App\Models\NomorSurat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\SuratData;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\Dashboard\Surat\SuratAction;
use App\Actions\Dashboard\Surat\ActionDeleteSurat;
use App\Actions\Dashboard\Surat\SuratActionDeleteArray;

class SuratController extends Controller
{
    public function index()
    {
        return view('admin.surat.index');
    }
    
    public function datatable()
    {
        $query = Surat::with('pegawai')->select(['nomor_surat','created_at','tempat_tujuan','slug']);

        return DataTables::of($query)
                ->addColumn('created_at', function ($surat) {
                    return date('d-m-Y', strtotime($surat->created_at));
                })
                ->addColumn('pegawai_names', function ($surat) {
                    return $surat->first()->pegawai->pluck('name')->implode(',');
                })
                ->addColumn('options', function ($row){
                    return '
                    <a href="' . route('dashboard.surat.cetakPdf', $row->slug) . '" class="btn btn-xs btn-success"><i class="fa fa-file-pdf text-white"></i></a>
                    <a href="' . route('dashboard.surat.show', $row->slug) . '" class="btn btn-xs btn-info"><i class="fa fa-eye text-white"></i></a>
                    <a href="' . route('dashboard.surat.edit', $row->slug) . '" class="btn btn-xs btn-warning"><i class="fa fa-pen text-white"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-xs btn-danger" id="btn-delete"><i class="fa fa-trash text-white"></i></button>
                ';
                })
                ->rawColumns(['options'])
                ->addIndexColumn()
                ->make(true);
    }

    public function create()
    {
        $sbms = Sbm::all();
        $nomor_surat = NomorSurat::all();
        $pegawais = Pegawai::all();
        $pimpinans = Pimpinan::all();
        return view('admin.surat.create', compact('sbms','nomor_surat','pegawais','pimpinans'));
    }
    public function store(SuratData $suratData, SuratAction $suratAction)
    {
        $suratAction->execute($suratData);
        return redirect()->route('dashboard.surat.index')->with('success',"Sukses Menambahkan Surat");
    }
    public function show(Surat $surat)
    {

       $nomor_surat = NomorSurat::all();
       return view('admin.surat.show', compact('surat','nomor_surat'));
    }
    public function edit(Surat $surat)
    {
        $sbms = Sbm::all();
        $nomor_surat = NomorSurat::all();
        $pegawais = Pegawai::all();
        $pimpinans = Pimpinan::all();
        return view('admin.surat.edit', compact('sbms','nomor_surat','surat','pegawais','pimpinans'));
    }
    public function update(SuratData $suratData, SuratAction $suratAction)
    {
        $suratAction->execute($suratData);
        // return redirect()->route('dashboard.surat.index', $suratData->slug)->with('success','Sukses Update Surat');
        return redirect()->back()->with('success','Sukses Update Surat');
    }
    public function destroy(ActionDeleteSurat $ActionDeleteSurat, Surat $surat)
    {
        if($ActionDeleteSurat)
        {
            $ActionDeleteSurat->execute($surat);
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Surat']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Gagal Menghapus Surat']);
        }

    }
    public function destroySuratArray(Request $request, SuratActionDeleteArray $suratActionDeleteArray)
    {
        if($suratActionDeleteArray)
        {
            $suratActionDeleteArray->execute($request);
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Surat']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Gagal Menghapus Surat']);
        }
    }
    public function cetak_pdf($slug)
    {
        $surat = Surat::where('slug', $slug)->first();
        $nomor_surat = NomorSurat::all();
        // // Load the view with the data
        // $html = view('admin.cetak.cetak_surat', ['surat' => $surat])->render();

        // $options = new Options();
        // $options->set('isRemoteEnabled', true);
        // $options->set('dpi', 150);

        // $options->set('isCssFloatEnabled', true);

        // $dompdf = new Dompdf($options);

        // $dompdf->loadHtml($html);

        // $dompdf->setPaper('A4', 'portrait');

        // $dompdf->render();

        // // Convert the rendered PDF content to base64 format
        // $pdfContent = $dompdf->output();
        // $pdfBase64 = base64_encode($pdfContent);
        // Embed the PDF content in an HTML iframe
        // return '<iframe src="data:application/pdf;base64,' . $pdfBase64 . '" width="100%" height="800px"></iframe>';
         // Load the view with the data
        // $pdf = PDF::loadView('admin.cetak.cetak_surat', ['surat' => $surat]);

        // // Set the paper size to A4
        // $pdf->setPaper('a4');

        // // Set additional options to match Chrome's print settings
        // $pdf->setOptions([
        //     'isPhpEnabled' => true, // Enable PHP rendering
        //     'isHtml5ParserEnabled' => true, // Enable HTML5 parsing
        //     'isRemoteEnabled' => true, // Allow loading of remote resources
        //     'dpi' => 120, // DPI (dots per inch)
        //     'defaultMediaType' => 'print', // Default media type
        //     'fontHeightRatio' => 1.1, // Font height ratio
        //     'isFontSubsettingEnabled' => true, // Enable font subsetting
        //     'isJavascriptEnabled' => true, // Enable JavaScript execution
        //     'isCssFloatEnabled' => true, // Enable CSS float
        //     'isFixedPosEnabled' => true, // Enable fixed positioning
        //     'isHtml5ParserEnabled' => true, // Enable HTML5 parsing
        //     'isImageOptimEnabled' => true, // Enable image optimization
        //     'isPdfaEnabled' => true, // Enable PDF/A mode
        //     'isHtml5ParserEnabled' => true, // Enable HTML5 parsing
        //     'isPhpEnabled' => true, // Enable PHP rendering
        // ]);

        // // // Download the PDF with a filename
        // return $pdf->stream('siswa' . $surat->nomor_surat . '.pdf');
        return view('admin.cetak.cetak_surat',compact('surat','nomor_surat'));

    }




}
