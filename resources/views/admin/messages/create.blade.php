@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">Broadcast Message To Students</div>

        <div class="card-body">
            <form
                    action="{{ url("/admin/messages/broadcast") }}"
                    method="POST"
                    enctype="multipart/form-data">
                @csrf

                <div class="form-group {{ $errors->has('msg_title') ? 'has-error' : '' }}">
                    <label for="msg_title">Message Title</label>
                    <input type="text" id="msg_title" name="msg_title" class="form-control"
                           value="{{ old('msg_title', isset($product) ? $product->msg_title : '') }}" step="0.01">
                    @if($errors->has('msg_title'))
                        <p class="help-block">
                            {{ $errors->first('msg_title') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.price_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('msg_body') ? 'has-error' : '' }}">
                    <label for="msg_body">Message Body</label>
                    <textarea id="msg_body" name="msg_body"
                              class="form-control ">{{ old('msg_body', isset($product) ? $product->msg_body : '') }}</textarea>
                    @if($errors->has('msg_body'))
                        <p class="help-block">
                            {{ $errors->first('msg_body') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.description_helper') }}
                    </p>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection

{{--





--}}
