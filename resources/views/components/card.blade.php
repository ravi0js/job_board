<article
    {{ $attributes->class([
        'rounded-md',       // Adds medium-rounded corners
        'border border-slate-600', // Adds a border with slate color
        'bg-white',         // Sets background color to white
        'p-4',              // Adds padding of 4 units
        'shadow-sm'         // Applies a small shadow effect
    ]) }}>
    {{ $slot }} <!-- This is where the child content will be inserted -->
</article>
