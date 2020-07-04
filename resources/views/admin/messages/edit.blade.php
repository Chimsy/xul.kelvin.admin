@extends('layouts.admin')
@section('content')

    <div class="card">


        <div class="card-header">Responding to <strong> {{ $msg_id[0]->reg_num}}</strong></div>


        <div class="card-body">
            <form
                    action="{{ url("admin/messages/post") }}"
                    method="POST"
                    enctype="multipart/form-data">

                @csrf
                @method('POST')




                {{-- Message Details --}}

                {{-- SOURCE_ID --}}
                <div class="form-group {{ $errors->has('source_id') ? 'has-error' : '' }}">
                    <label hidden for="source_id">Source ID</label>
                    <input type="number" id="source_id" name="source_id" hidden
                           class="form-control"
                           value="{{ old('source_id', isset($msg_id) ? $msg_id[0]->id : '') }}" step="0.01">
                    @if($errors->has('source_id'))
                        <p class="help-block">
                            {{ $errors->first('source_id') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.ecocash_helper') }}
                    </p>
                </div>
                {{-- SOURCE_ID End --}}

                {{-- MESSAGE_TITLE --}}
                <div class="form-group {{ $errors->has('msg_title') ? 'has-error' : '' }}">
                    <label for="msg_title">Message Tittle</label>
                    <input type="text" id="msg_title" readonly name="msg_title" class="form-control"
                           value="{{ old('msg_title', isset($msg_id) ? $msg_id[0]->msg_title : '') }}" step="0.01">
                    @if($errors->has('msg_title'))
                        <p class="help-block">
                            {{ $errors->first('msg_title') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.ecocash_helper') }}
                    </p>
                </div>
                {{-- MESSAGE_TITLE End --}}

                {{-- MESSAGE_BODY_RECEIVED --}}
                <div class="form-group {{ $errors->has('msg_body') ? 'has-error' : '' }}">
                    <label for="msg_body_rcvd">Message Body</label>

                    <input readonly type="text" id="msg_body_rcvd" name="msg_body_rcvd" class="form-control"
                           value="{{ old('msg_body', isset($msg_id) ? $msg_id[0]->msg_body : '') }}" step="0.01">
                    @if($errors->has('msg_body'))
                        <p class="help-block">
                            {{ $errors->first('msg_body') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.ecocash_helper') }}
                    </p>
                </div>
                {{-- MESSAGE_BODY_RECEIVED End --}}

                {{-- MESSAGE_BODY_REPLY --}}
                <div class="form-group {{ $errors->has('msg_body') ? 'has-error' : '' }}">
                    <label for="msg_body">My Reply</label>

                    <input type="text" id="msg_body" name="msg_body" class="form-control" value="">
                    @if($errors->has('msg_body'))
                        <p class="help-block">
                            {{ $errors->first('msg_body') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.ecocash_helper') }}
                    </p>
                </div>
                {{-- MESSAGE_BODY_REPLY End --}}

                <hr>
                {{-- MESSAGE_DETAILS End --}}


                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

@endsection
