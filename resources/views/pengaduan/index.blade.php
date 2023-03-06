@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Halaman pengaduan</h1>
@stop

@section('content')
<div class="card">
   <div class="card-body">
       @if (session('status'))
           <x-adminlte-alert theme="success" title="Sukses">
               {{session('status')}}
           </x-adminlte-alert>
       @endif
       @if ($errors->any())
           <x-adminlte-alert theme="success" title="Sukses">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </x-adminlte-alert>
       @endif
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_pengaduan" class="table table-striped table-hover table-condensed table-bordered">
               <thead>
               <tr style="background-color: rgb(2, 169, 215)">
                       <th>No</th>
                       <th>Nama</th>
                       <th>NIK</th>
                       <th>Nomor Telepon</th>
                       <th>tanggal pengaduan</th>
                       <th>isi laporan</th>
                       <th>Status Laporan</th>
                       <th>Tanggapan</th>
                       {{-- @if(\Auth::user()->level=='admin' or \Auth::user()->level=='petugas') --}}
                       <th class="text-center" width="">Aksi</th>
                       {{-- @elseif(\Auth::user()->level=='admin')
                       @endif --}}

                   </tr>
               </thead>
               <tbody>
               @foreach($pengaduan as $pengaduan)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$pengaduan->masyarakat->name}}</td>
                       <td>{{$pengaduan->masyarakat->nik}}</td>
                       <td>{{$pengaduan->masyarakat->hp}}</td>
                       <td>{{$pengaduan->tgl_pengaduan}}</td>
                       <td>{{$pengaduan->isi_laporan}}</td>
                       <td>{{$pengaduan->status}}</td>
                       <td>{{$pengaduan->tanggapan}}</td>
                           <td>
                            <a href="{{route('pengaduan.edit',$pengaduan->id)}}" class="btn btn-sm btn-primary"
                                title="Edit"><i class="far fa-edit"></i>Edit</a>
                                   <x-adminlte-button class="btn btn-sn btn-danger" label="Delete" data-toggle="modal" data-target="#hapuspengaduan{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger"> Hapus </x-adminlte-button>
                                       {{-- Custom --}}
                                   <x-adminlte-modal id="hapuspengaduan{{$loop->iteration}}" title="hapuspengaduan" size="md" theme="orange"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:80px;">
                                       <form action="{{route('pengaduan.delete',$pengaduan->id)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                             Apakah anda yakin akan menghapus pengaduan ini?</div>
                                   <x-slot name="footerSlot">
                                       <x-adminlte-button type="submit" class="mr-auto" theme="primary" label="Hapus"/>
                                       <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
                                       </form>
                                   </x-slot>
                                   </x-adminlte-modal>
                           </td>

                        </tr>
                       @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>


@stop
@section('plugins.Datatables', true)
@section('js')
   <script> $('#tabel_pengaduan').DataTable();</script>
@stop
