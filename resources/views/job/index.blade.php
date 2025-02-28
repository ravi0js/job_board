<x-layout>
    @foreach ($jobs as $job)
        {{ $job->title }}
      
    @endforeach
</x-layout>