
//This is for adding a clock with JQuery and Ajax.
//Credits go here:
//https://stackoverflow.com/questions/36965948/create-php-live-clock/36966070
$(document).ready(function() {
    setInterval(timestamp, 1000);
});

function timestamp() {
    $.ajax({
        url: 'http://localhost/timestamp.php',
        success: function(data) {
            $('#timestamp').html(data);
        },
    });
}