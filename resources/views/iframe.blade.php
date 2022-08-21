<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iframe</title>
</head>
<body>

<script crossorigin src="https://unpkg.com/@daily-co/daily-js"></script>

<script>
    function createFrameAndJoinRoom() {
        callFrame = window.DailyIframe.createFrame({
            iframeStyle: {
                position: 'fixed',
                border: '1px solid black',
                width: '375px',
                height: '450px',
                right: '1em',
                bottom: '1em',
            },
            dailyConfig: {
                micAudioMode: 'music',
            },
            showLeaveButton: true,
            showFullscreenButton: true,
        });
        callFrame.join({
            url: 'https://test-arslane.daily.co/uscwFxA58dL0hxQ0oke8',
            token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyIjoidXNjd0Z4QTU4ZEwwaHhRMG9rZTgiLCJ1IjoiQXJzbGFuIiwibyI6ZmFsc2UsImN0b2UiOnRydWUsInZvIjp0cnVlLCJkIjoiMGM4YWVmZWYtN2Q4ZC00YjIyLThhYWItNmY2ZGNiZTI2YmZmIiwiaWF0IjoxNjYwOTkxMjQxfQ._f6iFk6VqyRYp0IRliWrgXeU5VTNoM8HmoQWjWr0wlY'
        });
    }
</script>

</body>

</html>
