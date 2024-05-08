<?php
    $this->title = 'SeriesToday';
    use yii\helpers\Url;
?>
<main class="main">
<script>

    let events = [
        {
            title: 'All Day Event',
            start: '2024-03-01'
        },
        {
            title: 'Long Event',
            start: '2024-03-07',
            end: '2024-03-10'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: '2024-03-09T16:00:00'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: '2024-03-16T16:00:00'
        },
        {
            title: 'Conference',
            start: '2024-03-11',
            end: '2024-03-13'
        },
        {
            title: 'Meeting',
            start: '2024-03-12T10:30:00',
            end: '2024-03-12T12:30:00'
        },
        {
            title: 'Lunch',
            start: '2024-03-12T12:00:00'
        },
        {
            title: 'Meeting',
            start: '2024-03-12T14:30:00'
        },
        {
            title: 'Birthday Party',
            start: '2024-03-13T07:00:00'
        },
        {
            title: 'Click for Google',
            url: 'https://google.com/',
            start: '2024-03-28'
        }
    ];
    
    let posts = <?php echo json_encode(array_map(
        function($post) { 
            return [
                'title' => $post->name, 
                'start' => $post->date, 
                'url' => Url::to(['/post', 'id' => $post->id])
                ];
        }, 
    $posts))?>;
   

        

    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.querySelector('.main');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'multiMonthYear',
            initialDate: new Date(),
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            locale: 'ru',
            firstDay: 1,
            events: posts,
            dateClick: function(info){
                let link = new URL("<?= Url::to(['/posts'], 'http')?>");
                link.searchParams.set('date', info.dateStr);
                window.open(link, "_self");
            },
        });

        calendar.render();
    });

</script>
</main>
<!-- <div class="year">
    <div class="year__number">
        2023
    </div>
    <hr class="year__delimeter"/>
    <div class="year__months">
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
        <div class="calendar">
            <div class="calendar__month">
                <span>Month name</span>
            </div>
            <hr class="calendar__divider"/>
            <div class="calendar__dates">
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__text">
                    DAY
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number calendar__number-content">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
                <div class="calendar__number">
                    1
                </div>
            </div>
        </div>
    </div>
</div> -->