<!doctype html>
<html>
<head>
  <meta charset="UTF-8"> <!-- Sets character encoding -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ensures responsiveness -->
  
  <!-- Link to custom styles -->
  <link href="/src/styles.css" rel="stylesheet">
  
  <!-- Load Tailwind CSS via Vite -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
  class="from-10% via-30% to-90% mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 via-sky-100 to-emerald-100 text-slate-700">
  
  {{$slot}} <!-- This slot will be replaced with content from child templates -->

</body>
</html>
