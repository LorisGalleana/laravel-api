@extends('layouts.app')

@section('content')
    <h1>Elenco progetti eliminati</h1>


    @if(session('delete'))
        <div class="alert alert-success">
            {{ session('delete') }}
        </div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th scope="col">
                ID
            </th>
            <th scope="col">Immagine</th>
            <th scope="col">
                Titolo
            </th>
            <th scope="col">
                Data
            </th>
            <th scope="col">Tipologia</th>
            <th scope="col">Tecnologie</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project )
                <tr>
                    <td>{{ $project->id }}</td>
                    <td><img class="img-fluid thumb" src="{{ asset('storage/' . $project->path_image) }}" alt="{{ $project->image_original_name }}" onerror="this.src="></td>
                    <td>{{ $project->title }}</td>
                    <td>{{ ( $project->created_at )->format('d/m/Y') }}</td>
                    <td>
                        @if ($project->type)
                        <span class="badge text-bg-success">
                            <a class="text-white" href="{{ route('admin.projectPerType', $project->type) }}">{{ $project->type->name }}</a>
                        </span>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @forelse ($project->technologies as $technology )
                            <span class="badge text-bg-warning">
                                    {{  $technology->name}}
                            </span>
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>
                        <form class="d-inline" action="{{ route('admin.projects.restore', $project->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Ripristina</button>
                        </form>
                        <form class="d-inline" action="{{ route('admin.projects.delete', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $projects->links() }}
@endsection
