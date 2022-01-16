@extends('User.Index')
@section('title')
	Enrollment- graduation
@endsection
@section('description')
    {{-- <?php $description='description_'.$lang;echo $Bomon->$description; ?> --}}
@endsection
@section('content')
    <div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
    <div class="nonepad nonephone">
        @include('User.Layout.Banner')
        @include('User.Layout.Menubm')
    </div>
        <div class="container">
            <p style="text-align: center; font-size:15pt;">
                @if (session::has('language') && session::get('language')=='en')
                    Enrollment - Graduation
                @else
                  Trúng tuyển - Tốt nghiệp
                @endif
            </p>
            @if ($Enrollment)
            <table class="table table-hover">
                <thead>
                <tr>
                
                    <th scope="col">
                        @if (session::has('language') && session::get('language')=='en')
                            Years
                        @else
                            Năm
                        @endif
                    
                    </th>
                    <th scope="col">
                        @if (session::has('language') && session::get('language')=='en')
                            Number of admission students
                        @else
                            Số sinh viên đăng kí
                        @endif
                    
                    </th>
                    <th scope="col">
                        @if (session::has('language') && session::get('language')=='en')
                            Number of enrolled students
                        @else
                            Số sinh viên trúng tuyển
                        @endif
                        </th>
                    <th scope="col">
                        @if (session::has('language') && session::get('language')=='en')
                            Number of graduates
                        @else
                            Số sinh viên tốt nghiệp
                        @endif
                        
                    </th>
                    <th>
                        @if (session::has('language') && session::get('language')=='en')
                            Note
                        @else
                            Ghi chú
                        @endif
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($Enrollment as $er)
                    <tr>
                        <td>
                            @if (session::has('language') && session::get('language')=='en')
                                {{ $er->duration_en }}
                            @else
                                {{ $er->duration_vi }}
                            @endif
                        </td>
                        <td>{{ $er->admission }}</td>
                        <td>{{ $er->enrolled_student }}</td>
                        <td>{{ $er->graduated_student }}</td>
                        <td>{{ $er->note }}</td>
                    </tr>
                    @endforeach
                    
                   
                </tbody>
                </table>
            @else
                Upgrading...
            @endif
           
        </div>			




@endsection
