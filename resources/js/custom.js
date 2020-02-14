$(document).ready(function() {
    load_data("");

    function load_data(full_text_search_query = "") {
        // var _token = $("input[name=_token]").val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            // url: "{{ route('full-text-search.action') }}",
            url: "/full-text-search/action",
            method: "POST",
            data: {
                full_text_search_query: full_text_search_query
                // _token: _token
            },
            dataType: "json",
            success: function(data) {
                var output = "";
                if (data.length > 0) {
                    // output += "<?php> echo(" + $data + ")->links()</php>";

                    for (var count = 0; count < data.length; count++) {
                        output += "<php>";
                        output +=
                            "<td>" +
                            "<a href=/search/" +
                            data[count].id +
                            ">" +
                            data[count].name +
                            "</a>" +
                            "</td>";
                        output += "<td>" + data[count].year + "</td>";
                        output += "<td>" + data[count].college + "</td>";
                        output += "<td>" + data[count].branch + "</td>";
                        //   output += '<td>'+data[count].PostalCode+'</td>';
                        //   output += '<td>'+data[count].Country+'</td>';
                        output += "</php>";
                        output += "</tr>";
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
