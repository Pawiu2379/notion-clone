$(document).ready(function() {
    $('input[type="checkbox"]').on('change', function() {
        if(this.checked) {
            var checkboxValue = this.value
            var query;

            query = `UPDATE tasks
                             set status=1
                             where id = ${checkboxValue};`

            $.ajax({
                url: './functions/todov2.php',
                method: 'POST',
                data: { query: query },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }else{
            var checkboxValue = this.value
            query = `UPDATE tasks
                             set status=0
                             where id = ${checkboxValue};`

            $.ajax({
                url: './functions/todov2.php',
                method: 'POST',
                data: { query: query },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });

        }
    });
});
