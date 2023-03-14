//https://codepen.io/juan-patrick/pen/GRJWZmP
function createCalendar(calendar, year, month) {
    var currentDate = new Date();
    var daysOfMonth = new Date(year, month+1, 0).getDate();
    var firstDayOfMonth = new Date(year, month, 1).getDay();
    var weeksInMonth = Math.ceil((daysOfMonth + firstDayOfMonth)/7);

    var calendarBody = '<table>';
    calendarBody += '<tr><th>Nd</th><th>Pn</th><th>Wt</th><th>Śr</th><th>Cz</th><th>Pt</th><th>So</th></tr>';

    var dayOfMonth = 1;
    for (var i = 0; i < weeksInMonth; i++) {
        calendarBody += '<tr>';
        for (var j = 0; j < 7; j++) {
            if (i === 0 && j < firstDayOfMonth) {
                calendarBody += '<td></td>';
            } else if (dayOfMonth > daysOfMonth) {
                calendarBody += '<td></td>';
            } else {
                if (dayOfMonth === currentDate.getDate() && year === currentDate.getFullYear() && month === currentDate.getMonth()) {
                    calendarBody += '<td class="current-day">' + dayOfMonth + '</td>';
                } else {
                    calendarBody += '<td>' + dayOfMonth + '</td>';
                }
                dayOfMonth++;
            }
        }
        calendarBody += '</tr>';
    }
    calendarBody += '</table>';

    calendar.innerHTML = calendarBody;
}





var calendar = document.getElementById('calendar');
var currentDate = new Date();
createCalendar(calendar, currentDate.getFullYear(), currentDate.getMonth());


