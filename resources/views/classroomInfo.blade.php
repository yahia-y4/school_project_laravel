<!DOCTYPE html>
<html lang="en">
<x-app-layout>

    <head>

        <head>
            @vite(['resources/css/classrooms.css', 'resources/js/classrooms.js'])

            <title>الصفوف</title>
        </head>

    <body>

        <div class="main-page">
            <div class="page-title">
                <p>ادارة الصفوف</p>
            </div>

            <div class="msin-page-2 classrooms-page">

                <div class="container-div classroom-info-div" id="classroom-info-div">
                       <div class="buttons-div">
                    <button>تعديل</button>
                        <a href="{{ route('deleteClassroom',$classroom->id) }}"><button>حذف</button></a>
                        <a href={{ route('classrooms') }}><button>الغاء</button></a>
                    </div>

                    <div class="info-div">

                        <p> {{ $classroom->name }}</p>
                        <p>السعة : {{ $classroom->capacity }}</p>
                        <p>عدد الطلاب : {{ $students->count()}}</p>
                        <p>عدد المعلمين : {{$teachers->count()}}</p>
                       
                    
                    </div>
                    
                        <div class="description-div">
                            hhhhh hhhhh bkbkjbk kjkn lknn
                            jhjhkjhkj lkjlhl puuiyfhgbl

                        </div>
                    <div class="students-teachers-tables-div">
                        <div class="students-table">
                            <h3>طلاب هذا الصف :</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>الاسم</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $std)
                                        <tr>
                                            <td>{{ $std->id }}</td>
                                            <td>{{ $std->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="teachers-table">
                            <h3>معلمي هذا الصف :</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>الاسم</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->id }}</td>
                                            <td>{{ $teacher->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                 
                </div>


            </div>

        </div>
    </body>
</x-app-layout>

</html>
