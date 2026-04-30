<h2>Your Daily Reminders</h2>

<ul>
    @foreach($reminders as $reminder)
        <li>{{ $reminder->title }} at {{ \Carbon\Carbon::parse($reminder->reminder_time)->format('h:i A') }}</li>
    @endforeach
</ul>

<p>Have a productive day! 🚀</p>
