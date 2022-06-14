@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <h3>Welcome to Stock Manager</h3>
        <p>Quick links and chart of for total number of check-ins and check-outs per month</p>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="table-responsive">
                    <table class="table table-bordered dash">
                        <tbody>
                            <tr>
                                <td class="text-center btn-theme03">
                                    <a href="#"><i class="fa fa-barcode"></i> <span>Items</span></a>
                                </td>
                                <td class="text-center btn-theme03">
                                    <a href="#"><i class="fa fa-arrow-circle-up"></i> <span>Check-in Items</span></a>
                                </td>
                                <td class="text-center btn-theme03">
                                    <a href="#"><i class="fa fa-arrow-circle-down"></i> <span>Check-out Items</span></a>
                                </td>
                                <td class="text-center btn-theme03">
                                    <a href="#"><i class="fa fa-users"></i> <span>Users</span></a>
                                </td>
                                <td class="text-center btn-theme03">
                                    <a href="#"><i class="fa fa-cogs"></i> <span>Settings</span></a>
                                </td>
                                <td class="text-center btn-theme03">
                                    <a href="#"><i class="fa fa-download"></i> <span>Backups</span></a>
                                </td>
                                <td class="text-center btn-theme03">
                                    <a href="#"><i class="fa fa-upload"></i> <span>Updates</span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .content-panel {
        padding-top: 15px;
        margin-bottom: 40px;
    }

    .dash tr {
        background-color: #48cfad;
    }

    .dash td {
        width: 10%;
        padding: 0!important;
    }

    .dash td a {
        color: #FFF;
        display: block;
        padding: 15px 5px;
    }

    a, a:focus, a:hover {
        text-decoration: none;
        outline: 0;
    }

    .dash i {
        font-size: 4em;
        margin-bottom: 10px;
    }

    .fa {
        display: inline-block;
        font-family: FontAwesome;
        font-weight: 400;
        line-height: 1;
    }

    .dash span {
        display: block;
    }
    .bold, .dash span {
        font-weight: 700;
    }

    .btn-theme03 {
        color: #fff;
        background-color: #48cfad;
        border-color: #37bc9b;
    }
    .text-center {
        text-align: center;
    }

    .btn-theme03.active, .btn-theme03:active, .btn-theme03:focus, .btn-theme03:hover, .open .dropdown-toggle.btn-theme03 {
        color: #fff;
        background-color: #37bc9b;
        border-color: #37bc9b;
    }

    .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #ddd;
}
</style>
@endsection
