<!DOCTYPE html>

<html lang="en">
<x-app-layout>

    <head>

        @vite(['resources/css/students.css', 'resources/js/teachers.js'])

        <title>المعلمين</title>
    </head>

    <body>


        <div class="main-page">
            <div class="page-title">
                <p>ادارة المعلمين</p>
            </div>
            <div class="msin-page-2 students-mian-page">
                <form class="container-div students-inputs-div" action="/dashboard/teachers" method="POST">
                    @csrf

                    {{-- -----الاسم------- --}}
                    <div class="input-label-div">
                        <label for="name">الاسم</label>
                        <input type="text" id="name" name="name">
                    </div>
                    {{-- ---------------- --}}
                    {{-- -----الاميل------- --}}
                    <div class="input-label-div">
                        <label for="email">البريد الالكتروني</label>
                        <input type="email" id="email" name="email">
                    </div>
                    {{-- ---------------- --}}
                    {{-- -----تاريخ الميلاد------- --}}
                    <div class="input-label-div">
                        <label for="specialization">التخصص </label>
                        <input  id="specialization" name="specialization">
                    </div>
                    {{-- ---------------- --}}
                    {{-- -----الرقم------- --}}
                    <div class="input-label-div">
                        <label for="phone">الرقم</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                    {{-- ---------------- --}}
                    {{-- -----الصف------- --}}
                    <div class="input-label-div">
                        <label for="class">الصف</label>

                        <select name="classroom_id" id="class">
                            @if ($classrooms)
                                @foreach ($classrooms as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                    {{-- ---------------- --}}

                    <div class = "buttons-div">
                        <button type="submit">اضافة</button>

                    </div>
                </form>

                {{-- ------------------------------------------------------------ --}}

                {{-- -----------قائمة الطلاب------------- --}}
                <div class = "container-div students-list-div">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>الاسم</th>
                                <th>البريد الالكترون</th>
                                <th>الرقم</th>
                                <th>التخصص </th>
                                <th> الصف</th>
                                <th> </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($teachers)
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->id }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>{{ $teacher->specialization }}</td>
                                        @foreach ($classrooms as $classroom)
                                            @if ($classroom->id == $teacher->classroom_id)
                                                <td>{{ $classroom->name }}</td>
                                            @endif
                                        @endforeach
                                        <td onclick="showEdit(
                                                {{ $teacher->id }},
                                                {{ Js::from($teacher->name) }},
                                                {{ Js::from($teacher->email) }},
                                                {{ Js::from($teacher->specialization) }},
                                                {{ Js::from($teacher->phone) }},
                                                {{ $teacher->classroom_id }},
                                            )"
                                            class="table-buttun" style="background-color:  rgba(101, 75, 218, 0.322)">تعديل</td>
                                        <td class="table-buttun" style="background-color: rgba(255, 0, 0, 0.349)">
                                            <a href="/dashboard/teachers/delete/{{ $teacher->id }}">حذف</a>
                                        </td>


                                    </tr>
                                @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        {{-- للتعديل ---------- --}}
        <div id="edit-page-id" class="edit-container-div">
            <form class="container-div students-inputs-div" id="form_edit" method="POST">
                @csrf

                {{-- -----الاسم------- --}}
                <div class="input-label-div">
                    <label for="name">الاسم</label>
                    <input type="text" id="name_edit" name="name">
                </div>
                {{-- ---------------- --}}
                {{-- -----الاميل------- --}}
                <div class="input-label-div">
                    <label for="email">البريد الالكتروني</label>
                    <input type="email" id="email_edit" name="email">
                </div>
                {{-- ---------------- --}}
                {{-- -----تاريخ الميلاد------- --}}
                <div class="input-label-div">
                    <label for="specialization">التخصص </label>
                    <input  id="specialization_edit" name="specialization">
                </div>
                {{-- ---------------- --}}
                {{-- -----الرقم------- --}}
                <div class="input-label-div">
                    <label for="phone">الرقم</label>
                    <input type="text" id="phone_edit" name="phone">
                </div>
                {{-- ---------------- --}}
                {{-- -----الصف------- --}}
                <div class="input-label-div">
                    <label for="classroom_edit">الصف</label>
                    <select id="classroom_edit" name="classroom_id">
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- ---------------- --}}

                <div class = "buttons-div">

                    <button type="submit">تعديل</button>
                    <button onclick="hideEdit()" type="button">الغاء</button>

                </div>
            </form>
        </div>


    </body>
</x-app-layout>

</html>
