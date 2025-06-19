<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
