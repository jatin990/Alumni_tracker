@extends('layouts.app')
@section('content')

<div class="container">
    <br />
    <h3 align="center">Full Text Search in Laravel 6 using Ajax</h3>
    <br />
    <div class="row">
        <div class="col-md-10">
            <input type="text" name="full_text_search" id="full_text_search" class="form-control" placeholder="Search"
                value="">
        </div>
        <div class="col-md-2">
            @csrf
            <button type="button" name="search" id="search" class="btn btn-success">Search</button>
        </div>
    </div>
    <br />
    <div class="row">
        {{-- {{$data->links()}} --}}
    </div>
    <div id="hi" class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th> Name</th>
                    <th>Year</th>
                    {{-- <th>College</th> --}}
                    <th>branch</th>
                    {{-- <th>Postal Code</th>
                    <th>Country</th> --}}
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
load_data("");

function load_data(full_text_search_query = "") {
// var _token = $("input[name=_token]").val();
$.ajax({
headers: {
"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
},
url: "{{ route('full-text-search.action',['c_admin'=>auth()->user()->id]) }}",
// url: "/full-text-search/action",
method: "POST",
data: {
full_text_search_query: full_text_search_query
// _token: _token
},
dataType: "json",
success: function(data) {
var output = "";
if (data.length > 0) {
                    for (var count = 0; count < data.length; count++) {
                      if(data[count].verified===1){
                        output +="<tr>";
                        output +=
                                "<td>" +
                                "<a href=/c_admin_profile/"+{{auth()->user()->id}} +
                               '/view/'+ data[count].id +
                                ">" +
                                data[count].name +
                                "</a>" +
                                "</td>";
                        output += "<td>" + data[count].year + "</td>";
                        // output += "<td>" + data[count].college + "</td>";
                        output += "<td>" + data[count].branch + "</td>";
                        //   output += '<td>'+data[count].PostalCode+'</td>';
                        //   output += '<td>'+data[count].Country+'</td>';
                      
                        output += "</tr>";
                        }
                      
                    }
                } else {
                    output += "<tr>";
                    output += '<td colspan="6">No Data Found</td>';
                    output += "</tr>";
                }

                $("tbody").html(output);
            }
        });
    }

    $("#search").click(function() {
        var full_text_search_query = $("#full_text_search").val();
        load_data(full_text_search_query);
    });
});
</script>

@endsection