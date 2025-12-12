<h2>{{ $job->title }}</h2>

<p>Congratulations for your new job</p>
<p>
  <a href="{{ url('/jobs/' . $job->id) }}}}">Vie your job</a>
</p>