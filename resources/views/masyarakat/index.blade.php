@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Halaman Pengguna</h1>
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
               <tr style="background-color: rgb(124, 255, 161)">
                       <th>No</th>
                       <th>Nama</th>
                       <th>Username</th>
                       <th>NIK</th>
                       <th>Nomor Telepon</th>
                       <th class="text-center" width="">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($masyarakat as $masyarakat)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$masyarakat->name}}</td>
                       <td>{{$masyarakat->username}}</td>
                       <td>{{$masyarakat->nik}}</td>
                       <td>{{$masyarakat->hp}}</td>
                           <td>
                                   <x-adminlte-button class="btn btn-sn btn-danger" label="Delete" data-toggle="modal" data-target="#hapusmasyarakat{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger"> Hapus </x-adminlte-button>
                                       {{-- Custom --}}
                                   <x-adminlte-modal id="hapusmasyarakat{{$loop->iteration}}" title="hapusmasyarakat" size="md" theme="orange"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:80px;">
                                       <form action="{{route('masyarakat.delete',$masyarakat->id)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                             Apakah anda yakin akan menghapus pengguna ini?</div>
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
