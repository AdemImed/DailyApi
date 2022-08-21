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
                width: '1500px',
                height: '1000px',
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
            url: 'https://test-arslane.daily.co/Room-Api-test',
            token: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJyIjoiUm9vbS1BcGktdGVzdCIsImlhdCI6MTY2MTA4ODQ5MywiZXhwIjoxNjYxMDg4NTQzLCJkIjoiMGM4YWVmZWYtN2Q4ZC00YjIyLThhYWItNmY2ZGNiZTI2YmZmIiwidSI6IlRlc3QiLCJvIjpmYWxzZX0.BNKuycaHJv8up7mHE0NxmfFd5wposxfSkcVY-L1We-c'
        });
    }
    createFrameAndJoinRoom();
</script>

</body>

</html>
