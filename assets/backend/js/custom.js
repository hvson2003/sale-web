$(document).ready(function(){
    $('#dtable').DataTable({
        "ordering": false,
        "columnDefs": [ {
          "targets"  : 'no-sort',
          "orderable": false,
        }],
        "language": {
            "decimal":        "",
            "emptyTable":     "Không có dữ liệu",
            "info":           "Hiển thị _START_ đến _END_ của _TOTAL_ kết quả",
            "infoEmpty":      "Hiển thị 0 đến 0 của 0 kết quả",
            "infoFiltered":   "(được lọc từ _MAX_ total kết quả)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Hiển thị _MENU_ kết quả",
            "loadingRecords": "Đang tải...",
            "processing":     "Đang xử lý...",
            "search":         "Tìm kiếm:",
            "zeroRecords":    "Không kết quả nào được tìm thấy",
            "paginate": {
                "first":      "Đầu tiên",
                "last":       "Cuối cùng",
                "next":       "Tiếp theo",
                "previous":   "Trước"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });
});