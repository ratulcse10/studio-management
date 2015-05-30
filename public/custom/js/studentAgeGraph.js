$(document).ready(function() {
    var studentAge = $("#studentAge").get(0).getContext("2d");
    var studentGraphURLAge = "<?php echo URL::route('student.graph.age'); ?>";
    var studentAgeData = [];
    $.getJSON(studentGraphURLAge)

        .done(function(data) {
            $.each(data, function(i, item) {
                //console.log(item);
                var creator = {
                    value : item.value,
                    label : "Age -"+item.age,
                    color : 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')',
                    highlight : 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')'
                };

                studentAgeData.push(creator);

            });

            var studentAgeChart = new Chart(studentAge).Pie(studentAgeData, {segmentShowStroke : true});
        })

        .fail(function() {
            console.log('Oh no, something went wrong!');
            $('#studentAge').replaceWith('<h2>Oh no, something went wrong!</h2>');

        });
});
