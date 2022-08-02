<table>
    <thead>
        <tr>
            <th scope="col">Semester</th>
            <th scope="col">Tahun</th>
            <th scope="col">Program</th>
            <th scope="col">Guru Pengampu</th>
            <th scope="col">Nama Santri</th>
        </tr>
    </thead>
    <tbody>

        @foreach($student_assessment as $assessment)
        <tr>
            <td>{{$assessment->classes->semester}}</td>
            <td>{{$assessment->classes->year}}</td>
            <td>{{$assessment->classes->course->course_name}}</td>
            <td>{{$assessment->classes->teacher->name}}</td>
            <td>{{$assessment->student->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
