@extends('AstonLayouts::templates.resource')


@section('page-title')
    Aston | Admin/Departments/Create
@stop

@section('page-heading')
    Aston | New Subject
@stop

@section('page-buttons')

    <a href="{{route('subjects.index')}}" class="btn btn-default">Back</a>
@stop

@section('page-body')
    <div class="row">
        <div class="col-md-8">
            <form action="{{route('subjects.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="name" class="control-label">Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="name" class="control-label">Semester</label>
                        </div>
                        <div class="col-md-9">
                            <select name="sem" id="" class="form-control">
                                @for($i=1;$i<=8;$i++)
                                    <option value="{{$i}}">Semester {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="" class="control-label"> Faculty</label>
                        </div>
                        <div class="col-md-9">
                            <select name="faculties[]" id="" class="form-control" multiple="multiple">
                                @foreach(\App\Department::find( Session::get('dept_id'))->faculties() as $faculty)
                                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-11">
                            <input type="submit" value="Save" class="btn btn-sm btn-success pull-right">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
