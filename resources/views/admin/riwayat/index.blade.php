<x-app-layout>
	<x-slot name="title">Riwayat Diagnosis</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<x-card>
		<div class="table-responsive">
			<table class="table table-hover border">
			<thead>
				@role('Admin')
				<th>ID</th>
				@endrole
				<th>Nama</th>
				<th>Penyakit Terdiagnosa</th>
				<th>Tanggal</th>
				<th></th>
			</thead>
			<tbody>
				@forelse($riwayat->sortBy('id') as $row)
				<tr>
					@role('Admin')
					<td>{{ $row->id }}</td>
					@endrole
					<td>{{ $row->nama }}</td>
					<td>{{ unserialize($row->cf_max)[1] }} <b>(<span class="text-danger">{{ number_format(unserialize($row->cf_max)[0] * 100, 1) }}%</span>)</b></td>
					<td>{{ $row->created_at->format('d M Y') }}</td>
					<td>
						<a href="{{ asset("storage/downloads/$row->file_pdf") }}" target="_blank" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print mr-1"></i></a>
						<a href="{{ route('admin.riwayat', $row->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye mr-1"></i></a>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="5" class="text-center">Belum ada riwayat</td>
				</tr>
				@endforelse
			</tbody>
		</table>
		<div class="mt-3">
			{{ $riwayat->links() }}
		</div>
		</div>
	</x-card>
</x-app-layout>

<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://www.instagram.com/yovi.al.faridzi/" target="_blank">Yovi Widianto</a></b>
            </span>
          </div>
        </div>
      </footer>