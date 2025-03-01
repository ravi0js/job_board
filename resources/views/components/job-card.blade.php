<div class="mb-6 p-6 bg-white rounded-lg shadow-sm border border-slate-200">
    
    <!-- Job Title & Salary -->
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-xl font-semibold text-slate-800">{{ $job->title }}</h2>
        <div class="text-slate-600 font-medium">
            ${{ number_format($job->salary) }}
        </div>
    </div>

    <!-- Company & Location -->
    <div class="mb-4 flex items-center justify-between text-sm text-slate-600">
        <div class="flex items-center space-x-4">
            <span class="font-medium text-slate-700">🏢 Company Name</span>
            <span class="text-slate-500">📍 {{ $job->location }}</span>
        </div>

        <!-- Experience & Category Tags -->
        <div class="flex space-x-2 text-xs">
            <x-tag class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md font-medium">
                <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
                    {{ Str::ucfirst($job->experience) }}
                  </a>
                </x-tag>
                <x-tag>
                  <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
                    {{ $job->category }}
                  </a>
            </x-tag>
            <x-tag class="bg-green-100 text-green-700 px-2 py-1 rounded-md font-medium">
                {{ $job->category }}
            </x-tag>
        </div>
    </div>



    {{ $slot }}

</div>
