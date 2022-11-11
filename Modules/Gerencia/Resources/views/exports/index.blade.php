 <table class="table table-bordered table-sm">
    <thead class="thead">
        <tr>
            <td>#</td>
            <th>Ente</th>
            <th>Descripcion</th>
     x
        </tr>
    </thead>
    <tbody>
        @foreach($gerencias as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->ente->razon_social }}</td>
            <td>{{ $row->descripcion }}</td>

        @endforeach
    </tbody>
</table>
