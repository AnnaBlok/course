$(function() {
    $('#mark-as-watched-btn').on('click', function () {
        var id = $(this).attr('data-key');
        $.ajax({
            url: `/lesson/mark-as-watched/${id}`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    location.href = response.redirectUrl;
                } else {
                    alert(response.error);
                }
            },
            error: function(response) {
                alert(response.error);
            }
        });
    });
});