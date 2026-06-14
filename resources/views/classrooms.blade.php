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
                <form class="container-div classrooms-inputs-div" action="/dashboard/classrooms" method="POST">
                     @csrf

                    <div>
                        {{-- -----الاسم------- --}}
                        <div class="input-label-div">
                            <label for="name">الاسم</label>
                            <input type="text" id="name" name="name">
                        </div>
                        {{-- ---------------- --}}
                        {{-- -------الوصف----- --}}
                        <div class="input-label-div">
                            <label for="description">الوصف</label>
                            <textarea type="text" id="description" name="description"></textarea>
                        </div>
                        {{-- ---------------- --}}

                           {{-- -----السعة------- --}}
                        <div class="input-label-div">
                            <label for="capacity">السعة</label>
                            <input type="number" id="capacity" name="capacity">
                        </div>
                        {{-- ---------------- --}}
                    </div>
                    <div class="buttons-div">
                        <button type="submit">اضافة</button>
                      
                    </div>
                </form>
                <div class="container-div classrooms-list">
                    <table>
                        <thead>
                            <tr>
                                <th>اسم الصف</th>
                                <th> السعة</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($classrooms)
                                @foreach ($classrooms as $classroom )
                                     <tr>
                                <td> {{ $classroom->name }}</td>
                                <td>{{ $classroom->capacity }}</td>
                                <td onclick="showClassroomInfo()" class="more-classroom-info"><a href="#">. . .</a></td>
                            </tr>
                                @endforeach
                            @endif
                           
                        </tbody>
                    </table>
                </div>
                <div class="container-div classroom-info-div" id="classroom-info-div"></div>
            </div>

        </div>
    </body>
</x-app-layout>

</html>
