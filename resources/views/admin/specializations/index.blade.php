@extends('layouts.app')

@section('content')
    @include('layouts.partials.header')

    <div class="container">
        <h3>Specializations</h3>

        <a href="{{ route('admin.specializations.create') }}" class="btn btn-success mb-3">Tambah Specialization</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Deleted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($specializations as $s)
                    <tr>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->description }}</td>
                        <td>{{ $s->deleted_at ? $s->deleted_at->format('Y-m-d H:i') : '-' }}</td>
                        <td>
                            @if (!$s->deleted_at)
                                <a href="{{ route('admin.specializations.edit', $s->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('admin.specializations.destroy', $s->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Hapus specialization?')">Delete</button>
                                </form>
                            @else
                                <form action="{{ route('admin.specializations.restore', $s->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    <button class="btn btn-sm btn-primary">Restore</button>
                                </form>

                                <form action="{{ route('admin.specializations.force-delete', $s->id) }}" method="POST"
                                    style="display:inline;margin-left:4px;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus permanen?')">Force
                                        Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No specializations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
