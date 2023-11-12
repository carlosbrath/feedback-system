@include('layouts.welcome')

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links color-white">
        @auth
        <a href="{{ url('/home') }}">Dashboard</a>
            @csrf
        </form>
        @else
        <a style="color: white" href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
         <a href="{{ route('register') }}">Register</a> 
        @endif
        @endauth
    </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            <div class="clockStyle" id="clock">123</div>
        </div>


    </div>
</div>
<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var seconds = now.getSeconds().toString().padStart(2, '0');

        var timeString = hours + ':' + minutes + ':' + seconds;
        
        document.getElementById('clock').innerText = timeString;

        // Update every second
        setTimeout(updateClock, 1000);
    }

    // Initial call to display the time immediately
    updateClock();
</script>