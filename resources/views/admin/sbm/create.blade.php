@extends('layouts.dashboard')
@section('title', 'SBM')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header mt-2" style="background: none !important;">
                <h5 class="text-center">TAMBAH SBM</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.datamaster.sbm.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Biaya <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="biaya"
                                    placeholder="Masukan Nama Biaya" value="{{ old('biaya') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Daerah <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="daerah"
                                    placeholder="Masukan Daerah " value="{{ old('daerah') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan <code>*</code></label>
                                <input type="text" class="form-control form-control-sm border-input" name="satuan"
                                    placeholder="Masukan Satuan" value="{{ old('satuan') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nilai <code>*</code></label>
                                <div id="editor"></div>
                                <textarea name="nilai" id="content-editor" style="display: none;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('dashboard.datamaster.sbm.index') }}" class="btn btn-danger btn-rounded text-white">Kembali</a>
                            <button class="btn btn-primary btn-rounded float-end text-white">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>

<script>
    $(document).ready(function () {
        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean']
        ];

        const quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
        quill.on('text-change', function (delta, oldDelta, source){
            $('#content-editor').text($('.ql-editor').html());

        });
    });
</script>
@endpush
@endsection
