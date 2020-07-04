@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><strong>{{ trans('global.edit') }} {{ $product->name }}</strong></div>
{{\Illuminate\Support\Facades\Log::info($product)}}
        <div class="card-body">
            <form
                    action="{{ route("admin.products.update", [$product->id]) }}"
                    method="POST"
                    enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- STUDENTS_DETAILS --}}
                <div class="form-group"><strong>Student Details</strong></div>
                <hr>

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('global.product.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" readonly
                           value="{{ old('name', isset($product) ? $product->name : '') }}">
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                {{-- SOURCE_ID --}}
                <div class="form-group {{ $errors->has('source_id') ? 'has-error' : '' }}">
                    <label for="source_id">Source ID</label>
                    <input type="number" id="source_id" name="source_id" class="form-control"
                           value="{{ old('source_id', isset($product) ? $product->id : '') }}" step="0.01">
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

                {{-- PAYMENT_PLAN --}}
                <div class="form-group {{ $errors->has('payment_plan') ? 'has-error' : '' }}">
                    <label for="payment_plan">Payment Plan</label>
                    <input type="number" id="payment_plan" name="payment_plan" class="form-control"
                           value="{{ old('payment_plan', isset($product) ? $product->payment_plan : '') }}" step="0.01">
                    @if($errors->has('payment_plan'))
                        <p class="help-block">
                            {{ $errors->first('payment_plan') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.ecocash_helper') }}
                    </p>
                </div>
                {{-- PAYMENT_PLAN End --}}

                {{-- SEMESTER_REG_PLAN --}}
                <div class="form-group {{ $errors->has('semester_reg') ? 'has-error' : '' }}">
                    <label for="semester_reg">Semester Registration</label>
                    <input type="number" id="semester_reg" name="semester_reg" class="form-control"
                           value="{{ old('semester_reg', isset($product) ? $product->semester_reg : '') }}" step="0.01">
                    @if($errors->has('semester_reg'))
                        <p class="help-block">
                            {{ $errors->first('semester_reg') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.ecocash_helper') }}
                    </p>
                </div>
                {{-- SEMESTER_REG_PLAN End --}}

                {{-- EXAM_REG_PLAN --}}
                <div class="form-group {{ $errors->has('exam_reg') ? 'has-error' : '' }}">
                    <label for="exam_reg">Exam Registration</label>
                    <input type="number" id="exam_reg" name="exam_reg" class="form-control"
                           value="{{ old('exam_reg', isset($product) ? $product->exam_reg : '') }}" step="0.01">
                    @if($errors->has('exam_reg'))
                        <p class="help-block">
                            {{ $errors->first('exam_reg') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.ecocash_helper') }}
                    </p>
                </div>
                {{-- EXAM_REG_PLAN End --}}

                <hr>
                {{-- STUDENTS_DETAILS End --}}


                {{-- BANKING_DETAILS --}}
                <div class="form-group"><strong>Banking Details</strong></div>
                <hr>

                {{-- ECOCASH --}}
                <div class="form-group {{ $errors->has('ecocash') ? 'has-error' : '' }}">
                    <label for="ecocash">EcoCash</label>
                    <input type="number" id="ecocash" name="ecocash" class="form-control"
                           value="{{ old('ecocash', isset($product) ? $product->ecocash : '') }}" step="0.01">
                    @if($errors->has('ecocash'))
                        <p class="help-block">
                            {{ $errors->first('ecocash') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.ecocash_helper') }}
                    </p>
                </div>
                {{-- ECOCASH End --}}

                {{-- ZIPIT --}}
                <div class="form-group {{ $errors->has('zipit') ? 'has-error' : '' }}">
                    <label for="zipit">ZIPIT</label>
                    <input type="number" id="zipit" name="zipit" class="form-control"
                           value="{{ old('zipit', isset($product) ? $product->zipit : '') }}" step="0.01">
                    @if($errors->has('zipit'))
                        <p class="help-block">
                            {{ $errors->first('zipit') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.zipit_helper') }}
                    </p>
                </div>
                {{-- ZIPIT End --}}

                {{-- BANKING_DETAILS End --}}

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

@endsection
