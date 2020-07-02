@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/artis') }}">
	@csrf
	<h3>Daftar Track<a class="btn btn-outline-secondary" href="{{ url('track/create') }}">Tambah Data</a></h3>
	<table class="table-secondary ">
		<tr class="table-warning">
			<td>ID</td>
			<td>JUDUL LAGU</td>
			<td>ALBUM</td>
			<td>FILE</td>
			<td>HAPUS</td>
		</tr>
		@foreach($rows as $row)
		<tr class="cen">
			<td>{{ $row->track_id }}</td>
			<td>{{ $row->nama_track }}</td>
			<td>{{ $row->album->artis->nama_artis }} - {{ $row->album->nama_album }}</td>
			<td>
				<audio controls>
        			<source src="lagu/{{ $row->file }}" type="audio/mp3">
        		</audio>
			</td>
			<td><form action="{{ url('/track/'.$row->track_id) }}" method="post">
				<input type="hidden" name="_method" value="DELETE">
				@csrf
				<button id="btn" >Hapus</button>
			</form></td>
		</tr>
		@endforeach 
	</table>
</div>
@endsection