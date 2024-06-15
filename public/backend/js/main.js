$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id, url) {
    if(confirm('Chắc xóa không')) {
        $.ajax({
            type: 'DELETE',
            datatype : 'json',
            data: {id},
            url: url,
            success: function(result) {
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi, thử lại');
                }
            },
        });
    }
}

