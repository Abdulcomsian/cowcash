@extends('layouts.master')
@section('title')
ALL Users
@endsection
@section('css')
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')

<!-- Table section -->
<div style="width: calc(100% - 240px); margin-left: auto;">
    <div>
        <main class="main-content p-0">
            <div class="page-header py-1 justify-content-center">
                <div>
                    <div class="card card-small clinic-card d-flex">
                        <div class="card-header border-bottom">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <h2>User List</h2>
                                </div>
                            </div>
                        </div>

                        <div class="hidden-form d-none">
                            <form action="{{route('export.sheet')}}" method="post" id="export-form">
                                @csrf
                                <input type="text" name="fromDate" id="hiddenFromDate">
                                <input type="text" name="toDate" id="hiddenToDate">
                                <button type="submit">submit</button>
                            </form>

                        </div>
                    
                        <div id="export-table">
                            <div class="filter-area">
                                <div class="row p-3">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="fromDate">From Date</label>
                                            <input type="date" class="form-control" id="fromDate" placeholder="Enter From Date">
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="toDate">To Date</label>
                                            <input type="date" class="form-control" id="toDate" placeholder="Enter To Date">
                                          </div>
                                    </div>
                                    <div class="col-1 pt-4">
                                        <div class="form-group">
                                            <button class="btn btn-secondary text-white" id="filter">Filter</button>
                                          </div>
                                    </div>
                                    <div class="col-1 pt-4">
                                        <div class="form-group">
                                            <button class="btn btn-success text-white" id="export"><i class='fas fa-file-excel'></i>&nbspExport</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="export-table-section">
                                {{-- export table starts here --}}
                                @include('backend.Admin.components.export-table')
                                {{-- export table ends here --}}
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
@section('script')
@include('layouts.sweetalert.sweetalert_js')
<script>
    document.getElementById("filter").addEventListener('click' , function(e){
        let fromDate = document.getElementById("fromDate").value;
        let toDate = document.getElementById("toDate").value;
        $.ajax({
            method : 'POST',
            url : '{{route("filter.user")}}',
            datatype : 'HTML',
            data : {
                fromDate : fromDate,
                toDate : toDate,
                _token : '{{csrf_token()}}'
            },
            success : function(res){
                document.getElementById("export-table-section").innerHTML = res;
                swal("Good job!", "Table Has Been Updated!", "success");
            }
        })
    })

    document.getElementById('export').addEventListener('click' , function(e){
        let fromDate = document.getElementById("fromDate").value;
        let toDate = document.getElementById("toDate").value;
        document.getElementById('hiddenFromDate').value = fromDate;
        document.getElementById('hiddenToDate').value = toDate;
        document.getElementById("export-form").submit();
    })
</script>
@endsection

