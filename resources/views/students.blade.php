<!DOCTYPE html>

<html lang="en">
<x-app-layout>

    
    <head>

        @vite(['resources/css/students.css', 'resources/js/students.js'])

        <title>الطلاب</title>
    </head>

    <body>


        <div class="main-page">
            <div class="page-title">
                <p>ادارة الطلاب</p>
            </div>
            <div class="msin-page-2 students-mian-page">
                <form class="container-div students-inputs-div" action="/dashboard/students" method="POST">
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
                        <label for="date">تاريخ الميلاد</label>
                        <input type="date" id="date" name="birth_date">
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
                                <th>تاريخ الميلاد</th>
                                <th> الصف</th>
                                <th> </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($students)
                                @foreach ($students as $std)
                                    <tr>
                                        <td>{{ $std->id }}</td>
                                        <td>{{ $std->name }}</td>
                                        <td>{{ $std->email }}</td>
                                        <td>{{ $std->phone }}</td>
                                        <td>{{ $std->birth_date }}</td>
                                        @foreach ($classrooms as $classroom)
                                            @if ($classroom->id == $std->classroom_id)
                                                <td>{{ $classroom->name }}</td>
                                            @endif
                                        @endforeach
                                        <td onclick="showEdit(
                                                {{ $std->id }},
                                                {{ Js::from($std->name) }},
                                                {{ Js::from($std->email) }},
                                                {{ Js::from($std->birth_date) }},
                                                {{ Js::from($std->phone) }},
                                                {{ $std->classroom_id }},
                                            )"
                                            class="table-buttun" style="background-color: rgba(101, 75, 218, 0.322)">تعديل</td>
                                        <td class="table-buttun" style="background-color: rgba(255, 0, 0, 0.349)">
                                            <a href="/dashboard/students/delete/{{ $std->id }}">حذف</a>
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
                    <label for="birth_date">تاريخ الميلاد</label>
                    <input type="date" id="birth_date_edit" name="birth_date">
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
