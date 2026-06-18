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
                    <button onclick="showClassroomEdit({{  $classroom->id}},'{{ $classroom->name }}','{{ $classroom->capacity }}','{{ $classroom->description }}')">تعديل</button>
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
                            {{ $classroom->description }}
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



            {{-- -------------- تعديل ---------- --}}
<div class="edit-container-div" id="edit-page-id">
     <form  class="container-div classrooms-inputs-div" action="{{ route('editClassroom',$classroom->id) }}" method="POST">
                    @csrf

                    
                        {{-- -----الاسم------- --}}
                        <div class="input-label-div">
                            <label for="name">الاسم</label>
                            <input type="text" id="name_edit" name="name">
                        </div>
                        {{-- ---------------- --}}
                        {{-- -------الوصف----- --}}
                        <div class="input-label-div">
                            <label for="description">الوصف</label>
                            <textarea type="text" id="description_edit" name="description"></textarea>
                        </div>
                        {{-- ---------------- --}}

                        {{-- -----السعة------- --}}
                        <div class="input-label-div">
                            <label for="capacity">السعة</label>
                            <input type="number" id="capacity_edit" name="capacity">
                        </div>
                        {{-- ---------------- --}}
                    
                    <div class="buttons-div">
                        <button type="submit">تعديل</button>
                        <button onclick="hideClassroomEdit()" type="button">الغاء</button>

                    </div>
                </form> 
</div>
            
              

        </div>
    </body>
</x-app-layout>

</html>
