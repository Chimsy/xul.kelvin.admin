@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Student Summary Data</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Info boxes -->
                <div class="row">

                    {{-- SEMESTER_REG --}}
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-check"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Semester Registered</span>
                                <span class="info-box-number">{{ $semester_reg ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- SEMESTER_REG End --}}

                    {{-- PAY_PLAN --}}
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-check"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Payment Plan</span>
                                <span class="info-box-number">{{ $payment_play ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- PAY_PLAN End --}}

                    {{-- EXAM_REG --}}
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ban"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Exam Registered</span>
                                <span class="info-box-number">{{ $exam_reg ?? ''}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    {{-- EXAM_REG End --}}

                    {{-- NON_SEM_REG --}}
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info-gradient elevation-1">
                                <i class="fas fa-sync-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Non Sem-Reg</span>
                                <span class="info-box-number">{{ $not_semester_reg ?? '' }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    {{-- NON_SEM_REG End --}}

                    {{-- NON_EXAM_REG --}}
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1">
                                <i class="fas fa-history"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Non Exam-Reg</span>
                                <span class="info-box-number">{{ $not_exam_reg ?? '' }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    {{-- NON_EXAM_REG End --}}


                    {{-- TOTAL_STUDENTS --}}
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-dark-gradient elevation-1">
                                <i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Students</span>
                                <span class="info-box-number">{{ $total ?? '' }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    {{-- TOTAL_STUDENTS End --}}

                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection
