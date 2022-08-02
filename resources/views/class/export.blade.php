<table>
    <thead>
        <tr>
            <th scope="col">Semester</th>
            <th scope="col">Tahun</th>
            <th scope="col">Program</th>
            <th scope="col">Guru Pengampu</th>
        </tr>
    </thead>
    <tbody>

        @foreach($classes as $class)
        <tr>
            <td>{{$class->semester}}</td>
            <td>{{$class->year}}</td>
            <td>{{$class->course->course_name}}</td>
            <td>{{$class->teacher->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
