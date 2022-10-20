  <!-- Navbar -->
  @includeIf('layouts.header')

  <!-- Main Sidebar Container -->
  @includeIf('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <a href="/guru" class="btn btn-primary" style="margin-left: 10px;"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
	
	<br/>
	<br/>
	<table class="table table-hover">
		@foreach($siswa as $row)
		<form action="/siswa/edit_data" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="nisn" value="{{ $row->nisn }}">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" required="required" value="{{ $row->username }}"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" required="required" value="{{ $row->nama }}"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" required="required" value="{{ $row->alamat }}"></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tempat_lahir" required="required" value="{{ $row->tempat_lahir }}"></input></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tgl_lahir" required="required" value="{{ $row->tgl_lahir }}"></input></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><input type="text" name="jk" required="required" value="{{ $row->jk }}"></input></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><input type="text" name="agama" required="required" value="{{ $row->agama }}"></input></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td><input type="number" name="no_hp" required="required" value="{{ $row->no_hp }}"></input></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email" required="required" value="{{ $row->email }}"></input></td>
            </tr>
            </tr>
				<td><input type="submit" value="Simpan Data" class="btn btn-success"></td>
			</tr>
		</form>
		@endforeach
	</table>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   <!-- Footer -->
  @includeIf('layouts.footer')
