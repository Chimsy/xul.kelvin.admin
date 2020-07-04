@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><strong>STUDENT: </strong>{{ $product->name }}</div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>

                <tr>
                    <th>Registration #</th>
                    <td>{{ $product->reg_num }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $product->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{!! $product->email !!}</td>
                </tr>

                <tr>
                    <th>Payment Plan</th>
                    <td>{{ $product->payment_plan }}</td>
                </tr>

                <tr>
                    <th>Semester Registration</th>
                    <td>{{ $product->semester_reg }}</td>
                </tr>

                <tr>
                    <th>Exam Registration</th>
                    <td>{{ $product->exam_reg }}</td>
                </tr>

                <tr>
                    <th>Level</th>
                    <td>{{ $product->year }} . {{$product->semester}}</td>
                </tr>


                <tr>
                    <th>Program</th>
                    <td>{{ $product->program }}</td>
                </tr>

                <tr>
                    <th>Outstanding Program Fees</th>
                    <td>{{ $product->program_fees }}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><strong>Banking Details</strong></div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>

                <tr>
                    <th>EcaCash Float</th>
                    <td>RTGS${{ $product->ecocash }}.00</td>
                </tr>

                <tr>
                    <th>ZIPIT Float</th>
                    <td>RTGS${{ $product->zipit }}.00</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
