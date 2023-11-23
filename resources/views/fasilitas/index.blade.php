<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tambah Konten Fasilitas</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('fasilitas.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">JUDUL</th>
                                    <th scope="col">CONTENT</th>
                                    <th scope="col">AKSI</th>
                                </tr>

                                <a href="/dashboard" class="btn btn-md btn-danger mb-3">Go to Dashboard</a>

                            </thead>
                            <tbody>
                                @forelse ($fasilitass as $fasilitas)
                                    <tr>
                                        <td>{{ $fasilitas->title }}</td>
                                        <td>{!! $fasilitas->content !!}</td>
                                        
                                        <td class="text-center">
                                            
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('fasilitas.destroy', $fasilitas->id) }}"
                                                method="POST">
                                                {{-- <a href="{{ route('fasilitas.show', $fasilitas->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a> --}}
                                                <a href="{{ route('fasilitas.edit', $fasilitas->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                {{-- @csrf
                                                @method('DELETE')
                                               <form action="{{ route('fasilitas.destroy', $fasilitas->id) }}" method="POST"> --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" >Hapus</button>
                                            </form>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $fasilitass->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</body>

</html>
