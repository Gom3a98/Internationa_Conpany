@extends('admin.layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-right"><h3>{{ trans('offers.create_offer') }}</h3></div>

                    <div class="card-body text-right">
                        <form action="{{ route('offers.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="desc">{{trans('offers.desc')}}</label>
                                <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">{{trans('offers.price')}}</label>
                                <input type="number" name="price" class="form-control" id="price">
                            </div>
                            <div class="form-group">
                                <label for="duration">{{trans('offers.duration')}}</label>
                                <input type="number" name="duration" class="form-control" id="duration">
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="exampleFormControlSelect2">Example multiple select</label>--}}
{{--                                <select multiple class="form-control" id="exampleFormControlSelect2">--}}
{{--                                    <option>1</option>--}}
{{--                                    <option>2</option>--}}
{{--                                    <option>3</option>--}}
{{--                                    <option>4</option>--}}
{{--                                    <option>5</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <button type="submit" class="btn btn-primary">{{trans('offers.submit')}}</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection