@extends('admin.layouts.app')

@section('title', 'Keuangan')
@section('judul', 'Keuangan')

@section('content')
<div class="m-2">
    <a href="" class="btn btn-xs bg-blue text-white border-none">Export</a>
</div>
<div class="m-2 overflow-auto" style="width: 100%; overflow-x: auto;">

        <table class="table table-xs">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>company</th>
                    <th>location</th>
                    <th>Last Login</th>
                    <th>Favorite Color</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                        <th>1</th>
                        <td>Data 1kjjjjjjjjjjjjjjjjjjjjjjjjjjjj</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <td>Data 4</td>
                        <td>Data 5</td>
                        <td>Data 6</td>
                    </tr>
                @endfor
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>company</th>
                    <th>location</th>
                    <th>Last Login</th>
                    <th>Favorite Color</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
