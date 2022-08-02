<table>
    <thead>
        <tr>
            
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Asal Sekolah</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Nama Orangtua</th>
            <th scope="col">Nomor HP</th>
            <th scope="col">Pekerjaan Orangtua</th>
            <th scope="col">SPP</th>
            <th scope="col">Tanggal Bergabung</th>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $stud)
        <tr>
            
            <td>{{$stud->name}}</td>
            <td>@if($stud->gender == 1)
                Laki-Laki
                @else
                Perempuan
                @endif</td>
            <td>{{$stud->school_name}}</td>
            <td>{{$stud->address}}</td>
            <td>{{$stud->birth_place}}</td>
            <td>{{$stud->birth_date}}</td>
            <td>{{$stud->parents_name}}</td>
            <td>{{$stud->phone_no}}</td>
            <td>{{$stud->parent_occupation}}</td>
            <td>{{$stud->tuition_fee}}</td>
            <td>{{$stud->join_date}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
