@extends('User.Index')
@section('title')
	Enrollment - Graduation 
@endsection

<style>
    table{
      table-layout: fixed;
    }
    td{
        word-wrap:break-word
    }
</style>
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">@include('User.Layout.Banner') @include('User.Layout.Menu')</div>
	<section class="container-fluid">	
		<div class="container">
			<div class="row gioithieu">
					<div class="col-lg-12 col-md-9 col-sm-8 col-xs-12">
						<p class="tieude">
                            @if (session::has('language') && session::get('language')=='en')
                                Enrollment - Graduation
                            @else
                              Trúng tuyển - Tốt nghiệp
                            @endif
            </p>							
            {{-- @if ($Enrollment)
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
                        <td>{{ $er->enrolled_student }}</td>
                        <td>{{ $er->graduated_student }}</td>
                        <td>{{ $er->note }}</td>
                    </tr>
                    @endforeach
                    
                   
                </tbody>
                </table>
            @else
                Upgrading...
            @endif --}}
            Upgrading...
			  </div>
      </div>
    </div>
	</section>
@endsection	